<?php
namespace app\index\model;
use think\Model;
use think\Config;
use think\Db;
header('content-type:text/html;charset=utf-8');
class Bing extends Model{

	function initialize()
	{
		parent::initialize();

	}
	
	function get_list($where = '',$order = '',$page_size=12){
		if(!$order){ $order = 'date desc';}
		$bings = $this->where($where)->order($order)->limit($page_size)->select();
		$bings = $this->where($where)->order($order)->paginate($page_size);
		$pages=$bings->render();
		$bings = $bings->toArray();
		$bings['pages'] = $pages;
		foreach ($bings['data'] as $k => $v) {
			$bings['data'][$k]['img_url']=Config::get('qiniuyun')['DOMAIN'].$v['img_url'];
		}
                //Config::get('qiniuyun')['DOMAIN']
		return $bings;
	}

	function find_one(){
		$bings = $this->where(['date'=>date('Ymd')])->limit(1)->select();
		return $bings;
	}
	
	function insertOne($data){
		if(@$data==''){echo "data is null";exit();};
			$res=$this->insert($data);
			return $res;
	}
	function select_one($date){
		if(@$date==''){echo "data is null";exit();};
		$bings = Db::query('select * from bing where date=:date',['date'=>$date]);
		$bings[0]['img_url']=Config::get('qiniuyun')['DOMAIN'].$bings[0]['img_url'];
		$num=$bings[0]['view_num']+1;
		Db::table('bing')->where(['date'=>$date])->update(['view_num' => $num]);
		return $bings[0];
	}
}
