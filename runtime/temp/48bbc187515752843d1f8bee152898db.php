<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:27:"./template/index\index.html";i:1543888642;s:39:"E:\Tp5_Bing\template\common\header.html";i:1543888063;s:39:"E:\Tp5_Bing\template\common\footer.html";i:1543861044;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="wb:webmaster" content="291bb2a31ff6be0a" />
    <meta name="baidu-site-verification" content="lOmvn6xFVw" />
    <meta name="keywords" content="必应壁纸,杰新博客,电脑壁纸,手机壁纸,高清壁纸,无水印,壁纸免费下载,风景壁纸,bing" />
    <meta property="og:description" content="必应在国内的名气不是很大，很多人不知道。必应是美国微软的搜索引擎，类似与百度。不过，有个地方很有趣，必应的首页背景图，每日一换，从不重复。都是团队精选的世界各地的风景、人文类的美图，配有相关文字描述。" />
    <link rel="stylesheet" type="text/css" href="./template/static/css/iconfont.css">
    <link rel="icon" href="./template/static/images/bing.ico" sizes="32x32">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.js"></script>
    <link rel="stylesheet" href="./template/static/css/progressively.css">
    <link href="./template/static/css/shang.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./template/static/css/common.css?v=20181115">
    <link rel="stylesheet" href="./template/static/css/main.css?v=2018">
    <title>必应高清壁纸-每天不止一点新鲜感</title>
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
<body oncontextmenu="self.event.returnValue=false">
<div class="bg_shang"></div>
<header>
    <div class="container">
        <a class="logo" href="/">
        <i class="icon icon-bing"></i>
            <span>必应壁纸</span>
        </a>
        <nav>
            <ul class="menu">
                <li>
                    <a href="/" style="color:red;">
                        <p class="text">首页</p>
                    </a>
                </li>
                <li>
                    <a href="https://cn.bing.com/" target="_blank">
                        <p class="text">必应搜索</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('index/about'); ?>">
                        <p class="text">关于</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>	
<div class="holder"></div>
<div class="mask"></div>
<div class="container">
    <?php if(is_array($bings) || $bings instanceof \think\Collection || $bings instanceof \think\Paginator): $i = 0; $__LIST__ = $bings;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <div class="item">
        <div class="card progressive">
            <?php $op=config('options');if($op['img_source']=='sina'):?>
            <img src="./template/static/images/loading.jpg" data-original="<?php echo $v['sina_url']; ?>" class="lazy s_pic">
            <?php elseif($op['img_source']=='qiniu'):?>
            <img src="./template/static/images/loading.jpg" data-original="<?php echo $v['img_url']; ?>" class="lazy s_pic">
            <?php endif;?>
            <a class="mark" href="<?php echo url('index/view',['date'=>$v['date']]); ?>"></a>
            <div class="description" style="font-size:14px;font-weight:bold">
                <p>
                <i class="fa fa-diamond"></i>
                <em class="t"><?php echo $v['name']; ?></em>
                </p>
                <p class="calendar">
                    <i class="fa fa-calendar-check-o"></i>
                    <em class="t"><?php echo $v['date']; ?></em>
                </p>
                <p class="location">
                    <i class="fa fa-globe"></i>
                    <em class="t"><?php echo $v['area']; ?></em>
                </p>
            </div>
            <div class="options">

                <a class="ctrl download" href="javascript:;" target="_blank" rel="nofollow" title="被查看次数">
                     <i class="fa fa-eye"></i>
                    <em class="t"><?php echo $v['view_num']; ?></em>
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="page">
    <?php echo $pages; ?>
</div>
<div class="copyright" style="margin-top:80px">
    <h5>本站所有图片均来自
        <a rel="nofollow" href="http://cn.bing.com/" target="_blank">必应搜索</a>
    </h5>
    <p style="font-size:13px;" id="yephy"></p>
    <p style="font-size:13px;color:gray">本次访问页面加载花费了：<?php echo str_replace('ms','毫秒',sprintf('%.2fms', (microtime(TRUE) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000));?></p>
    <p style="font-size: 13px">Copyright © 2017 - 2018
        <a href="https://neweb.top" target="_blank">杰新博客</a>  <a href="/sitemap.xml">网站地图</a>
    </p>
    <p style="font-size: 13px">
        <a href="http://www.miibeian.gov.cn/" target="_blank">晋ICP备18002329-3号</a>
    </p>
</div>
<script>
   $("img.lazy").lazyload({effect : "fadeIn"});
</script>
<script src="https://api.neweb.top/template/static/js/push.js"></script>
<script>(function(){
var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?8cb6c1328e12d2fa217e139e35e5092e":"https://jspassport.ssl.qhimg.com/11.0.1.js?8cb6c1328e12d2fa217e139e35e5092e";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
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
</body>
</html>	