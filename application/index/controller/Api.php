<?php
namespace app\index\controller;
header('content-type:text/html;charset=utf-8');
use think\Controller;
use think\Model;
class Api extends Controller{

		function _initialize()
	    {
	        parent::_initialize();
	        $this->model = model('bing');
	        $this->api_model=model('api');
	        $this->qiniu_model=model('qiniu');
	        $this->sina_model=model('sinapic');
	    }

		function create_data(){
			//查询今日的数据是否生成
			$res=$this->model->find_one();
			if($res){
				exit('今日数据已生成！感谢您的访问');
			}
			$data=$this->api_model->get_data();
			if($data){ 
				//保存图片到七牛云
				$result=$this->qiniu_model->upload($data['img_url']);
                                //保存到新浪图床
				$res_sina=$this->sina_model->ready($data['img_url']);
                             
				if($result['err']!=1&&$res_sina['code']==200){
					//保存数据到数据库
					$data['img_url']=$result['data'];
                                        $data['sina_url']=$res_sina['img_url'];
					$rres=$this->model->insertOne($data);
					if($rres){print_r('今日数据七牛云、新浪图床均已写入成功！-'.date('Y-m-d H:i:s'));}else{print_r('数据写入失败');}
				}else{
					print_r('新浪图床或七牛云保存失败');
				}

			}else{
				print_r('接口数据获取失败');
			}
		}
	
}