<?php

use think\Db;
use think\Model;
//获取地址
	function area(){
		$unknown = 'unknown';
	      if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
	         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	      }elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
	         $ip = $_SERVER['REMOTE_ADDR'];
	      }

      	if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip));
	    getAreaByIp($ip);

	}

	function getAreaByIp($ip){
		if($ip==''){echo 'eror';}
		 $ipContent = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=".$ip);
		 $data=json_decode($ipContent,1);
		 $ipData=$data['data']['country'].$data['data']['region'].$data['data']['city'].$data['data']['isp'];
		 model('ip')->insertOne($ip,$ipData);
		 print_r($data['data']['city']);
		}
//浏览次数
	function num(){
		$countfile=fopen("count.txt","r");
		$count=fread($countfile,100);
		$count++;
		echo $count;
		$countfile2=fopen("count.txt","w");
		fwrite($countfile2,$count);
		fclose($countfile);
	}