# Bing-Wallpapers
自动采集保存必应壁纸、故事，支持七牛云、新浪图床。

## 展示图片：
### 首页
![页面展示图](https://xiaolexin.github.io/le/bing2.png)
### 详情页
![页面展示图](https://xiaolexin.github.io/le/bing3.png)
### 关于
![页面展示图](https://xiaolexin.github.io/le/bing4.png)
![页面展示图](https://xiaolexin.github.io/le/bing5.png)

## 特点：

* 每天自动通过Bing官方API抓取壁纸、壁纸故事数据存储本地，图片存储于七牛云对象存储或新浪免费图床（配置中可以设置）。
* 系统默认采用“每日首次点击首页判断是否当日数据是否更新，若未更新则自动更新，更新则不理会。”。建议在服务器加一个定时任务，每日凌晨几点访问接口一次即可。
* 自动更新数据接口: http://您的域名/index/api/create_data. (您的域名，配置文件一定配置！！！否则，必出错。)
* 关于部分，支持打赏、编辑网站介绍，配置畅言评论。
* 网站采用 https://bing.ioliu.cn/ 的前端样式，在此向作者表示感谢！拥有支持响应式显示、懒加载、CSS3高斯模糊等优秀特性。
* 七牛云对象存储详细配置，请自行查找官方文档解决。新浪图床，只需要配置账号、密码即可。（不要设置登陆验证）
* 数据无价！数据库数据截止20181204，之后的数据请自行想办法，不要向我索取。勿做伸手党！
* 其他，待续。。。

## 说明：

本项目，采用目前最优秀的php框架之一ThinkPHP5.0开发，代码简单，功能较少。从策划到开发完成，也才花费5天。其中，不免问题很多，欢迎大家访问我的博客，提出建议和意见。博客地址：https://neweb.top 如果你喜欢这个项目，请帮忙点下小星星，在此表示感谢！！！
