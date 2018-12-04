<?php
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Session;
use think\Config;
class Index extends controller
{

	function _initialize()
    {
        parent::_initialize();
        $this->model = model('bing');
    }

    public function index()
    {
    	$bings=$this->model->get_list();
        //自动抓取bing api并创建当日壁纸数据
        if(@Session::get('date')!=date('Ymd')){
            Session::set('date',date('Ymd'));
            file_get_contents(config('options')['domain'].'/index/api/create_data');
        }
    	return view('index/index',['bings'=>$bings['data'],'pages'=>$bings['pages']]);
    }

    public function view(){
        $date=input('date');
        $s=$this->model->select_one($date);

        return view('detail/view',['bings'=>$s]);
    }
    public function about(){

        return view('about/index');
    }

    
}
