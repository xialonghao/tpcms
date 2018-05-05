<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::rule('welcome','/admin/index/welcome');

Route::rule('newslist','/admin/news/newslist');//资讯管理列表
Route::rule('newsadd','/admin/news/newsadd');//资讯管理
Route::rule('newsup','/admin/news/newsup');//资讯管理修改
Route::rule('newsrecover','/admin/news/newsrecover');//资讯回收站
Route::rule('newspage','/admin/news/newspage');//评论列表
Route::rule('catelist','/admin/news/catelist');//资讯分类列表
Route::rule('cateadd','/admin/news/cateadd');  //资讯分类添加
Route::rule('cateup','/admin/news/cateup');		//资讯分类修改
Route::rule('caterecover','/admin/news/caterecover');//资讯分类回收站
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
