<?php
namespace app\index\model;
use think\Config;
use think\Model;
use think\Session;

class Sinapic{

    public function ready($url){

      //账号
      $u = confid('sinaImg')['sina_num'];
      //密码
      $p = confid('sinaImg')['sina_pwd'];

      $cookie = $this->login($u,$p);
      $session=Session::set('sina_cookie',$cookie);
      if(Session::has('sina_cookie')){
          // 接收图片路径
          $file=$url;
          //"http://cn.bing.com/az/hprichbg/rb/NarrowsZion_ZH-CN9686302838_1920x1080.jpg";
          if (isset($file) && $file != "") {
            $cookie=session('sina_cookie');
            $res= $this->upload($file,$cookie);
            return $res;
          }else{
            return $this->error('201','上传错误');
          }
      }else{
          echo "session is null";
      }
      
    }

    public function error($code,$msg){
        $arr = array('code'=>$code,'msg'=>$msg);
        echo json_encode($arr);
    }
    /**
     * 新浪微博登录(无加密接口版本)
     * @param  string $u 用户名
     * @param  string $p 密码
     * @return string    返回最有用最精简的cookie
     */
    public function login($u,$p){

      $loginUrl = 'https://login.sina.com.cn/sso/login.php?client=ssologin.js(v1.4.15)&_=1403138799543';
      $loginData['entry'] = 'sso';
      $loginData['gateway'] = '1';
      $loginData['from'] = 'null';
      $loginData['savestate'] = '30';
      $loginData['useticket'] = '0';
      $loginData['pagerefer'] = '';
      $loginData['vsnf'] = '1';
      $loginData['su'] = base64_encode($u);
      $loginData['service'] = 'sso';
      $loginData['sp'] = $p;
      $loginData['sr'] = '1920*1080';
      $loginData['encoding'] = 'UTF-8';
      $loginData['cdult'] = '3';
      $loginData['domain'] = 'sina.com.cn';
      $loginData['prelt'] = '0';
      $loginData['returntype'] = 'TEXT';
      return $this->loginPost($loginUrl,$loginData); 
    }

    /**
     * 发送微博登录请求
     * @param  string $url  接口地址
     * @param  array  $data 数据
     * @return json         算了，还是返回cookie吧//返回登录成功后的用户信息json
     */
    public function loginPost($url,$data){
      $tmp = '';
      if(is_array($data)){
        foreach($data as $key =>$value){
          $tmp .= $key."=".$value."&";
        }
        $post = trim($tmp,"&");
      }else{
        $post = $data;
      }
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$url); 
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
      curl_setopt($ch,CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch,CURLOPT_POST,1);
      curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
      $return = curl_exec($ch);
      curl_close($ch);
      return 'SUB' . $this->getSubstr($return,"Set-Cookie: SUB",'; ') . ';';
    }

    /**
      * 取本文中间
    */
      public function getSubstr($str,$leftStr,$rightStr){
        $left = strpos($str, $leftStr);
        //echo '左边:'.$left;
        $right = strpos($str, $rightStr,$left);
        //echo '<br>右边:'.$right;
        if($left <= 0 or $right < $left) return '';
        return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
      }

      public function upload($file,$cookie) {
      
        $url = 'http://picupload.service.weibo.com/interface/pic_upload.php'.'?mime=image%2Fjpeg&data=base64&url=0&markpos=1&logo=&nick=0&marks=1&app=miniblog';
        
        $post['b64_data'] = base64_encode(file_get_contents($file));
        
        // Curl提交
        $ch = curl_init($url);
        curl_setopt_array($ch, array(
          CURLOPT_POST => true,
          CURLOPT_VERBOSE => true,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HTTPHEADER => array("Cookie: $cookie"),
          CURLOPT_POSTFIELDS => $post,
        ));
        $output = curl_exec($ch);
        curl_close($ch);
        // 正则表达式提取返回结果中的json数据
        preg_match('/({.*)/i', $output, $match);
        if(!isset($match[1])) return error('201','上传错误');
        $a=json_decode($match[1],true);
        $pid = $a['data']['pics']['pic_1']['pid'];
        if(!$pid){return error('201','上传错误');}
        $arr = array('code'=>'200',"pid"=>$pid,'img_url'=>'https://ww2.sinaimg.cn/large/'.$pid);
        return $arr;
      }
}









