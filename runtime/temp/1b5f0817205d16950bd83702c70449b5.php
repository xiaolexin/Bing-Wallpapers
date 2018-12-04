<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:27:"./template/about\index.html";i:1543891834;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>关于 | 必应每日高清壁纸 - 精彩，从这里开始</title>
    <meta name="keywords" content="必应壁纸,必应美图,必应每日壁纸,必应每日美图,必应壁纸下载,必应每日壁纸下载,必应每日壁纸接口,必应每日壁纸官方下载,Bing壁纸,微软bing每日壁纸">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <html xmlns:wb="http://open.weibo.com/wb">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="telephone=no,email=no" name="format-detection">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,Chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="<?php echo config('options')['domain'];?>/template/static/images/bing.ico" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="<?php echo config('options')['domain'];?>/template/static/css/vue.css">
    <link href="<?php echo config('options')['domain'];?>/template/static/css/shang.css" rel="stylesheet" type="text/css">
    <script src="https://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?5f18eaeb7bce19b4fa39d079f4c10c7e";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</head>

<body>
    <div class="bg_shang"></div>
    <section class="content" style="overflow:auto;">
        <article class="markdown-section" id="main">
            <h1  style="text-align: center;">
                <a href="/" ><i class="icon icon-bing"></i><span>必应壁纸</span></a>
            </h1>
            <p style="text-align: center;"><i class="serif">Bing</i> 每日壁纸，你值得拥有</p>
            <br>
            <p><a href="javascript:void(0)" style="color:#fff;" onclick="dashangToggle()" class="dashang" title="打赏，支持一下">打赏</a></p>
            <div class="hide_box"></div>
            <div class="shang_box">
                <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭"><img src="https://xiaolexin.github.io/le/close.png" alt="取消" /></a>

                <div class="shang_tit">
                    <p>感谢您的支持，多多少少是心意!</p>
                </div>
                <div class="shang_payimg">
                    <img src="https://xiaolexin.github.io/le/alipayimg.png" alt="扫码支持" title="扫一扫" />
                </div>
                    <div class="pay_explain">租服务器太贵，跪求大佬解囊相助！(┳_┳)</div>
                <div class="shang_payselect">
                    <div class="pay_item checked" data-id="alipay">
                        <span class="radiobox"></span>
                        <span class="pay_logo"><img src="https://static.runoob.com/images/dashang/alipay.jpg" alt="支付宝" /></span>
                    </div>
                    <div class="pay_item" data-id="weipay">
                        <span class="radiobox"></span>
                        <span class="pay_logo"><img src="https://static.runoob.com/images/dashang/wechat.jpg" alt="微信" /></span>
                    </div>
                </div>
                <div class="shang_info">
                    <p>打开<span id="shang_pay_txt">支付宝</span>扫一扫，即可进行扫码打赏哦</p>
                    <p>Powered by <a href="https://neweb.top" target="_blank" title="杰新博客">NEWEB.TOP</a>，轻松学习、快乐生活！</p>
                </div>
            </div>
            </div>
            
            <p>一直很喜欢bing的首页壁纸，每天更换一张，从不重复。精选全世界各地的炒鸡好看的图片，这么好的资源怎么能够放过？！可惜，官网首页图片有水印，并且只能保存十多天的时间，这个就尴尬了。。。</p>
            <p>前一段时间，找到了官方暴露出来的API，可以获取到【无水印】的高清壁纸，并且可以获取到相关壁纸的每日故事.这下把我高兴坏了，这就意味着我可以获取到这些壁纸和相关故事了。那么问题又来了，存在哪里呢？</p>
            <p>如果简单的放在服务器（虚拟主机）中，访问速度慢不说，时间久了，必然要升级服务器配置，费用也会随之变高。一旦服务器到期，这些壁纸将无处可存。近日，发现了可以使用【又拍云】存储，并且还支持域名的配置访问。免费额度有10G容量，最起码几年内足够了。以后就算付费，也不是很高，费用还负担得起。</p>
            <p>当然，就算七牛云不用了，还有新浪图床，免费、无额度限制、支持外链。以后可能闲下来会换吧！（估计很久很久以后的事了...）</p>
            <p>开始工作吧！由于自己是一名PHPer，自然选择了相对擅长的php来做后台逻辑，采用Thinkphp5.2搭建后台，前台实在太渣，不会写。。。说到这里，还需要感谢<a href="https://bing.ioliu.cn/" target="_blank">必应壁纸</a>，前端样式基本暂时抄袭了他的。以后，会慢慢修改出自己的特色和功能的。这只是起步！！！</p>
            <h3 style="text-align: center;">明日必应壁纸预览</h3>
            <p><img src="<?php echo config('options')['NextDayBing'];?>" alt=""></p>
            <p>好了，就说这么多吧！欢迎访问我的个人博客留言交流：<a href="https://neweb.top">杰新博客</a></p>
        </article>
    </section>
        
        <div id="SOHUCS" style="max-width: 800px;"></div>
        <div id="cyBarrage" role="cylabs" data-use="barrage"></div>
        <script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
        <script type="text/javascript">
        window.changyan.api.config({
        appid: 'cytV2Pj6y',
        conf: 'prod_84e2bda310918d2cf409ca1a33bf7261'
        });
        </script>
</body>
<script>
$(function(){
    $(".pay_item").click(function(){
        $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
        var dataid=$(this).attr('data-id');
        $(".shang_payimg img").attr("src","https://xiaolexin.github.io/le/"+dataid+"img.png");
        $("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");
    });
});
function dashangToggle(){
    $(".hide_box").fadeToggle();
    $(".shang_box").fadeToggle();
}
</script>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>

</html>