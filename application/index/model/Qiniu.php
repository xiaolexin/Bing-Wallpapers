<?php

namespace app\index\model;
use think\Model;
use think\Config;
use Qiniu\Auth as Auths;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;
class Qiniu{

	 public function upload($url)
    {
      
       			if(@$url==''){
       				$filePath=Config::get('options')['CurDayBing'];
       			}else{
       				$filePath=$url;
       			}
   			    $file= UPLOADS_PATH.'images/'.date('Ymd').'.jpg';
			      $img = file_get_contents($filePath);
			      file_put_contents($file,$img);
            require_once APP_PATH . '/../vendor/qiniucloud/autoload.php';

            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = Config::get('qiniuyun')['ACCESSKEY'];
            $secretKey = Config::get('qiniuyun')['SECRETKEY'];
            // 构建鉴权对象
            $auth = new Auths($accessKey, $secretKey);
            // 要上传的空间
            $bucket = Config::get('qiniuyun')['BUCKET'];
            $domain = Config::get('qiniuyun')['DOMAIN'];
            $token = $auth->uploadToken($bucket);
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            $key = date('Ymd').'.jpg';
            list($ret, $err) = $uploadMgr->putFile($token, $key, $file);
            unlink($file);
            if ($err !== null) {
                return ["err"=>1,"msg"=>$err,"data"=>""];
            } else {
                //返回图片的完整URL
               	return ["err"=>0, "data"=>$ret['key']];
            }
    }
}