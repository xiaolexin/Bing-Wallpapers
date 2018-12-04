<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
// Route::alias('/','index/index/index/');
Route::alias('about','index/about');
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[bing]'     => [
        'about'   => ['index/about', ['method' => 'get'], ['id' => '\d+']],
        ':date' => ['index/view', ['method' => 'get']]
    ],
    '__alias__' =>  [
        '/'  =>  'index/index',
    ],
    
];