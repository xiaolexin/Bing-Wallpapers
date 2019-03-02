<?php

namespace app\index\model;
use think\Model;
use think\Config;
use think\Db;
header('content-type:text/html;charset=utf-8');
class Api extends Model{

	function get_data(){
		
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, 'http://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        'User-Agent: Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36'
	    ));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $re = curl_exec($ch);
	    curl_close($ch);
	    $res1 = json_decode($re,1);//电脑版返回内容
	    // $res2 = json_decode(file_get_contents('https://cn.bing.com/cnhp/coverstory/'),1);//移动版返回内容
	    $res= array(
	    	/* 更改图片尺寸，减小体积 */
	        'img_url' => 'https://cn.bing.com'.str_replace('1920x1080','1366x768',$res1['images'][0]['url']),
	        /* 结束日期 */
	        'date' => date('Ymd'),
	        /* 故事标题 */
	        'name' => $res1['images'][0]['copyright'],
	        /* 内容 */
	        // 'content' => $res2['para1'],
	        /*地区*/
	        // 'area' => $res2['Continent'].','.$res2['attribute']
	    );
	    return $res;
	}
}