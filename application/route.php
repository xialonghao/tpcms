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
//Route::rule('index','admin/aduser/index');
Route::rule('welcome','admin/aduser/welcome');
Route::rule('quit','quit/aduser/quit'); 
//系统设置
Route::rule('system_base','admin/system/system_base');  //基本设置
Route::rule('lists','admin/system/lists');  //客服列表
Route::rule('system_shielding','admin/system/system_shielding'); //
Route::rule('system_log','admin/system/system_log');  //系统日志
Route::rule('state','admin/system/state'); 
Route::rule('listbanner','admin/system/listbanner');
Route::rule('blogroll_list','admin/system/blogroll_list');
Route::rule('rebanner','admin/system/rebanner');
Route::rule('huishouzhan','admin/system/huishouzhan');
Route::rule('rubbish_bin','admin/system/rubbish_bin');
Route::rule('system_user_show','admin/system/system_user_show');
Route::rule('add','admin/system/add');
Route::rule('add_banner','admin/system/add_banner');
Route::rule('up_banner','admin/system/add_banner'); 
//咨询管理
Route::rule('newslist','/admin/news/newslist');//资讯管理列表
Route::rule('newsadd','/admin/news/newsadd');//资讯管理
Route::rule('newsup','/admin/news/newsup');//资讯管理修改
Route::rule('newsrecover','/admin/news/newsrecover');//资讯回收站
Route::rule('newspage','/admin/news/newspage');//评论列表
Route::rule('catelist','/admin/news/catelist');//资讯分类列表
Route::rule('cateadd','/admin/news/cateadd');  //资讯分类添加
Route::rule('cateup','/admin/news/cateup');		//资讯分类修改
Route::rule('caterecover','/admin/news/caterecover');//资讯分类回收站
Route::rule('adlist','/admin/ad/adlist');//广告列表
Route::rule('database_backups','/admin/news/backdb');//数据库列表
//用户管理
Route::rule('userlist','./admin/member/userlist'); //前台用户列表
Route::rule('useradd','./admin/member/useradd'); //前台用户添加
Route::rule('userup','./admin/member/userup'); //前台用户修改
Route::rule('userdel','./admin/member/userdel'); //前台用户删除
Route::rule('userban','./admin/member/userban'); 
//用户等级
Route::rule('user_grade_list','./admin/member/usergradelist');
Route::rule('usergradeadd','./admin/member/usergradeadd');
Route::rule('usergradeup','./admin/member/usergradeup');//前台
Route::rule('titleslist','./admin/member/titleslist');//用户解禁列表
Route::rule('recycle_bin','./admin/member/recycle_bin');//用户回收站
//管理员管理
Route::rule('admin-list','admin/aduser/aduserlist');            //管理员列表
Route::rule('do_acb','admin/aduser/do_acb');            //模板列表
Route::rule('admin-add','admin/aduser/aduseradd');           //管理员添加页面
Route::rule('admin-update','admin/aduser/aduserupdate');      //管理员修改页面
Route::rule('do_aduseradd','admin/aduser/do_aduseradd');      //添加管理员处理
Route::rule('do_aduserupdate','admin/aduser/do_aduserupdate');//修改管理员处理
Route::rule('aduser_change_status','admin/aduser/aduser_change_status');//修改管理员的状态
Route::rule('aduser_delete','admin/aduser/aduser_delete');//删除（批量删除） 管理员
Route::rule('admin-permission','admin/aduser/aduserrule');      //权限管理列表
Route::rule('admin-permission-edit','admin/aduser/ruleupdate'); //权限修改页面
Route::rule('admin-permission','admin/aduser/aduserrule');      //权限管理列表
Route::rule('permission_status','admin/aduser/permission_status');  //修改权限状态（启用、禁用）
Route::rule('aduser_permission_delete','admin/aduser/aduser_permission_delete');  //删除（批量删除） 权限
Route::rule('ruleverify','admin/aduser/ruleverify');   //权限名字合法性验证
Route::rule('do_updats','admin/aduser/do_updats');    //权限修改处理页面
Route::rule('admin-permission-add','admin/aduser/ruleadd');  //权限添加
Route::rule('do_addrule','admin/aduser/do_addrule');      //权限添加处理
Route::rule('adverify','admin/aduser/adverify');          //管理员姓名验证
Route::rule('admin-role','admin/aduser/aduserrole');      //角色管理列表
Route::rule('Admin-role-add','admin/aduser/roleadd');    //角色添加
Route::rule('do_roleadd','admin/aduser/do_roleadd');      //角色添加处理
Route::rule('admin-role-up','admin/aduser/roleupdate');   //角色修改
Route::rule('roleverify','admin/aduser/roleverify');     //权限名字合法性验证
Route::rule('do_aduser','admin/aduser/do_aduser');       //角色修改处理
Route::rule('role_delete','admin/aduser/role_delete');  //删除（批量删除）角色
Route::rule('rule_parent','admin/aduser/rule_parent');
Route::rule('rule_parent','admin/aduser/rule_parent');    //权限上一级
//Route::rule('login','admin/login/login');
Route::rule('database_backups','admin/aduser/database_backups'); 
Route::rule('database_restore','admin/aduser/database_restore');
//广告位管理
Route::rule('adlist','/admin/Ad/adlist');
Route::rule('adrecover','/admin/Ad/adrecover');
Route::rule('adadd','/admin/Ad/adadd');
Route::rule('adup','/admin/Ad/adup');
Route::rule('delad','/admin/Ad/delad');
Route::rule('deladcate','/admin/Ad/deladcate');
Route::rule('reback','/admin/Ad/reback');
Route::rule('rebackcate','/admin/Ad/rebackcate');
Route::rule('adcaterecover','/admin/Ad/adcaterecover');
Route::rule('adcatelist','/admin/ad/adcatelist');
Route::rule('adcateadd','/admin/ad/adcateadd');
Route::rule('adcateup','/admin/ad/adcateup');
Route::rule('readvert','/admin/Ad/readvert');
Route::rule('database_backups','/admin/Ad/database_backups');
Route::rule('database_restore','/admin/Ad/database_restore');
//导航管理
Route::rule('listnav','/admin/nav/listnav'); //导航管理列表
Route::rule('rnav','/admin/nav/rnav');  //   导航回收站
Route::rule('addnav','/admin/nav/addnav');  //添加导航
Route::rule('upnav','/admin/nav/upnav');   //修改导航
// 前台页面
Route::rule('about','home/Index/about');
Route::rule('news','home/Index/news');
Route::rule('course','home/Index/course');
Route::rule('course1','home/Index/courses');
Route::rule('eDetail','home/Index/eDetail');
Route::rule('exam','home/Index/exam');
Route::rule('nDetil','home/Index/nDetail');
Route::rule('notice','home/Index/notice');
Route::rule('ownTopic','home/Index/ownTopic');
Route::rule('ownTopic1','home/Index/ownTopics');
Route::rule('password','home/Index/password');
Route::rule('personal','home/Index/personal');
Route::rule('public','home/Index/publics');
Route::rule('register','home/Index/register');
Route::rule('resource','home/Index/resource');
Route::rule('resource1','home/Index/resources');
Route::rule('schoolmate','home/Index/schoolmate');
Route::rule('tcDetail','home/Index/tcDetail');
Route::rule('tDetail','home/Index/tDetail');
Route::rule('tDetail1','home/Index/tDetails');
Route::rule('teachers','home/Index/teachers');
Route::rule('teachers1','home/Index/teacherss');
Route::rule('topic','home/Index/topic');
Route::rule('upload','home/Index/upload');
Route::rule('vDetail','home/Index/vDetail');
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
