<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"D:\phpStudy\WWW\dzcms/application/index\view\index\index.html";i:1505980633;s:63:"D:\phpStudy\WWW\dzcms/application/index\view\public\header.html";i:1505980633;s:61:"D:\phpStudy\WWW\dzcms/application/index\view\public\menu.html";i:1505980633;s:63:"D:\phpStudy\WWW\dzcms/application/index\view\public\footer.html";i:1505980633;}*/ ?>
﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--/meta 作为公共模版分离出去-->
	
<title>DZ.admin v1.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/lib/html5.js"></script>
<script type="text/javascript" src="__STATIC__/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/style.css" />
<!--[if IE 6]-->
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="index.html">DZ.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/">DZ</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav class="nav navbar-nav">
                <ul class="cl">
                    <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                            <li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                            <li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>超级管理员</li>
                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="#">切换账户</a></li>
                            <li><a href="#">退出</a></li>
                        </ul>
                    </li>
                    <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">

    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 内容管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="content_list" title="内容列表">内容列表</a></li>
                    <li><a href="recycle_page" title="回收站">回收站</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-picture">
            <dt><i class="Hui-iconfont">&#xe613;</i> 栏目管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="column_list" title="栏目列表">栏目列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 模板管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="templet_page" title="选择模板">选择模板</a></li>

                    <li><a href="static_page" title="生成静态页面">生成静态页面</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-comments">
            <dt><i class="Hui-iconfont">&#xe622;</i> 链接管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="blogroll_list" title="链接列表">链接列表</a></li>
                    <li><a href="rubbish_bin" title="回收站">回收站</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 前台用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="user_list" title="用户列表 ">用户列表 </a></li>
                    <li><a href="admin_permission" title="用户等级列表">用户等级列表</a></li>
                    <li><a href="admin_list" title="用户解禁列表">用户解禁列表</a></li>
                    <li><a href="recycle_bin" title="回收站">回收站</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 广告位管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="listadvert" title="广告列表 ">广告列表 </a></li>
                    <li><a href="readvert" title="回收站">回收站</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> Banner图管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="" title="广告列表 ">Banner图列表 </a></li>
                    <li><a href="reBanner" title="回收站">回收站</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 导航管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="listnav" title="导航列表 ">导航列表 </a></li>
                    <li><a href="renav" title="回收站">回收站</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 后台用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="admin_list1" title="广告列表 ">后台用户列表 </a></li>
                    <li><a href="admin_del" title="回收站">回收站</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 权限管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="admin_permission" title="权限列表 ">权限列表 </a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 用户组管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="admin_role_list" title="用户组列表 ">用户组列表 </a></li>
                    <li><a href="admin_role_del" title="回收站 ">回收站 </a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 客服管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="lists" title="客服列表 ">客服列表 </a></li>
                    <li><a href="huishouzhan" title="回收站 ">回收站 </a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-system">
            <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="system_base" title="系统设置">系统设置</a></li>
                    <!-- <li><a href="system-category.html" title="栏目管理">栏目管理</a></li> -->
                    <!-- <li><a href="system-data.html" title="数据字典">数据字典</a></li> -->
                    <!-- <li><a href="system-shielding.html" title="屏蔽词">屏蔽词</a></li> -->
                    <!-- <li><a href="system-log.html" title="系统日志">系统日志</a></li> -->
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>

<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
<nav class="breadcrumb">
			<div class="container">
				<i class="Hui-iconfont">&#xe67f;</i>
				<a href="/" class="c-primary">首页</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">欢迎页</span>
			</div>
		</nav>
			<div class="container ui-sortable">
			<h2 style="color: #59b7ed">欢迎使用DZCMS V1.0后台模版！</h2>
			<div class="panel panel-default">					
					<div class="panel-header clearfix">
					<span class="f-l">后台相关信息</span>
				</div>
				<div class="panel-body" style=" height: 150px;">
				<div style="float: left; width: 41.3%; height: 146px; border: 1px solid #ccc; border-right: none; ">
					    <div style="height: 40;padding-left: 10px;line-height: 40px; font-weight: 700; font-size: 15px;">我的信息</div>
					    <div>
							<div style=" padding-left: 50px; height: 30px; width: 50%; text-align: left;">你好，admin</div>
							<div style=" padding-left: 50px; height: 30px;  width: 50%; text-align: left;">所属角色，超级管理员</div>
							<div style=" padding-left: 50px; height: 30px;  width: 50%; text-align: left;">邮箱，www.123@aa.com</div>
					    </div>
				</div>
					<div class="message" style="float: left; width: 58.5%;">
						<table class="table table-border table-bordered table-hover">
			            <tbody   class="text-c" style="height: 146px">
			               <tr>
			                <th width="20%"><a href="#" style="font-size: 14px">内容数量</a></th>
			                <td><a href="#" style="font-size: 14px">20</a></td>
			              </tr>
			              <tr>
			                <th width="20%"><a href="#" style="font-size: 14px">栏目数量</a></th>
			                <td><a href="#" style="font-size: 14px">30</a></td>
			              </tr>
			              <tr>
			                <th width="20%"><a href="#" style="font-size: 14px">会员数量</a></th>
			                <td><a href="#" style="font-size: 14px">40</a></td>
			              </tr>
			            </tbody>
    				</table>
					</div>
    				
				</div>
				<div class="panel-body" style=" height: 350px;">
				<div class="table_list" style="float: left; width: 46%;">
				<div class="panel-header clearfix" style="background-color: #f5f5f5">
					<span class="f-l">系统相关信息</span>
				</div>
					<table class="table table-border table-bordered table-hover" style="margin-top: 20px">
					 <thead>
					        <tr><th width="20%">类别</th><th>描述</th></tr>
					      </thead>
			            <tbody>
			              <tr>
			                <th width="20%">DZcms版本</th>
			                <td>1.0.131129</td>
			              </tr>
			               <tr>
			                <th width="20%">服务器操作系统</th>
			                <td>WINNT</td>
			              </tr>
			               <tr>
			                <th width="20%">ThinkPHP版本</th>
			                <td>3.2.0RC1</td>
			              </tr>
			               <tr>
			                <th width="20%">运行环境</th>
			                <td>Apache/2.4.23 (Win32) OpenSSL/1.0.2j PHP/5.4.45</td>
			              </tr>
			               <tr>
			                <th width="20%">上传限制</th>
			                <td>2M</td>
			              </tr>
			               <tr>
			                <th width="20%">MYSQL版本</th>
			                <td>5.5.53</td>
			              </tr>
			            </tbody>
    				</table>

				</div>

					<div class="table_list" style="float: left; width: 51.5%; padding-left: 28px; ">
						<div class="panel-header clearfix" style="background-color: #f5f5f5">
							<span class="f-l">团队相关信息</span>
						</div>
						<table class="table table-border table-bordered table-hover" style="margin-top: 20px">
					      <thead>
					        <tr><th width="20%">Class</th><th>描述</th></tr>
					      </thead>
			            <tbody>
			             <tr>
			                <th width="20%">总策划</th>
			                <td>山哥</td>
			              </tr>
			               <tr>
			                <th width="20%">产品设计及研发团队</th>
			                <td>山哥</td>
			              </tr>
			               <tr>
			                <th width="20%">界面及用户体验团队</th>
			                <td>php班所有成员</td>
			              </tr>
			               <tr>
			                <th width="20%">官方网址</th>
			                <td>www.dacms.com</td>
			              </tr>
			               <tr>
			                <th width="20%">官方QQ群</th>
			                <td>6666666</td>
			              </tr>
			               <tr>
			                <th width="20%">BUG反馈</th>
			                <td>dzcms讨论社</td>
			              </tr>
			            </tbody>
    				</table>
					</div>
    				
				</div>
			</div>
			       
			 
		</div>
</section>

<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="__STATIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">

</script>
<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>