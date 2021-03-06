<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:21:"./admintpl/index.html";i:1508237916;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>DZ.admin v2.0</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">DZ.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">DZ</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v2.0</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 管理员</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i>系统 </a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li><?php echo $vo['title']; ?></li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A"><?php echo $vo['username']; ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-id="<?php echo $vo['id']; ?>" id="myselfinfo">个人信息</a></li>
						<li><a href="#">切换账户</a></li>
						<li><a data-id="<?php echo $vo['id']; ?>" href="javascript:;" id="quit">退出</a></li>
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
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="newslist.html" data-title="资讯管理" href="javascript:void(0)">资讯管理</a></li>
						<li><a data-href="catelist.html" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
					<li><a data-href="newsrecover.html" data-title="回收站" href="javascript:void(0)">回收站</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 页面管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="404.html" data-title="单页面管理" href="javascript:;">单页面管理</a></li>
			</ul>
		</dd>
	</dl>
			<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i>导航管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="listnav.html" data-title="导航管理" href="javascript:;">导航管理</a></li>
					<li><a data-href="rnav.html" data-title="回收站" href="javascript:;">回收站</a></li>
			</ul>
		</dd>
	</dl>
			<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i>模版管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="404.html" data-title="模版列表" href="javascript:;">模版列表</a></li>
					<li><a data-href="<?php echo url('Aduser/do_templet'); ?>" data-title="模版设置" href="javascript:;">模版设置</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i>广告位管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo url('Ad/adlist'); ?>" data-title="广告位管理" href="javascript:;">广告位管理</a></li>
					<li><a data-href="<?php echo url('Ad/adcatelist'); ?>" data-title="广告分类管理" href="javascript:;">广告分类管理</a></li>
					<li><a data-href="<?php echo url('Ad/adrecover'); ?>" data-title="回收站" href="javascript:;">广告回收站</a></li>
					<li><a data-href="<?php echo url('Ad/adcaterecover'); ?>" data-title="回收站" href="javascript:;">分类回收站</a></li>
			</ul>
		</dd>
	</dl>
	<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 用户中心<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="userlist.html" data-title="用户管理" href="javascript:;">用户管理</a></li>
					<li><a data-href="user_grade_list.html" data-title="用户等级" href="javascript:void(0)">用户等级</a></li>
					<li><a data-href="titleslist.html" data-title="用户解禁列表" href="javascript:void(0)">用户解禁列表</a></li>
					<li><a data-href="recycle_bin.html" data-title="回收站" href="javascript:void(0)">回收站</a></li>
					
			</ul>
		</dd>
	</dl>
				<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i>数据库管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="database_backups.html" data-title="数据库备份" href="javascript:;">数据库备份</a></li>
					<li><a data-href="database_restore.html" data-title="数据库还原" href="javascript:;">数据库还原</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="admin-role.html" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
					<li><a data-href="admin-permission.html" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>
					<li><a data-href="admin-list.html" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="system_base.html" data-title="系统设置" href="javascript:void(0)">基本设置</a></li>
				
					<li><a data-href="lists.html" data-title="客服管理" href="javascript:void(0)">客服管理</a></li>
					<li><a data-href="system_log.html" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>
					<li><a data-href="" data-title="附件管理" href="javascript:void(0)">附件管理</a></li>
					<li><a data-href="listbanner.html" data-title="banner管理" href="javascript:void(0)">banner管理</a></li>
					<li><a data-href="blogroll_list.html" data-title="友情链接" href="javascript:void(0)">友情链接</a></li>
					</a></li>
					<li><a data-href="reBanner.html" data-title="回收站" href="javascript:void(0)">回收站（banner）</a></li>
					<li><a data-href="huishouzhan.html" data-title="客服回收站" href="javascript:void(0)">回收站（客服）</a></li>
						<li><a data-href="blogroll_list.html" data-title="客服回收站" href="javascript:void(0)">回收站（链接）</a></li>
			</ul>
		</dd>
	</dl>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="welcome.html"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/public/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$('#quit').click(function(){
	var  idds=$(this).attr('data-id');
		layer.confirm('确认要退出吗？',function(index){
		$.ajax({
			type:'POST',
            url:'http://www.dz.com/admin/Aduser/quit.html',
            data:{id:idds},
			 success: function(data){
              switch (data.status){
                            case 1:
                                layer.msg('退出成功', {
                                       // offset: 't',
                                        anim: 0
                                    });
                               	  setInterval(function () {
                                    location.href='http://www.dz.com/admin/login/login.html';
                                },1000);

                            break;
                            case 2:
                                layer.alert('退出失败 ');
                                break;
                        }
				
              
            },
            error:function(data) {
                console.log(data.msg);
            },
		});
                 
	});
	});

/*个人信息*/
$.post('url', {}, function(str){
  layer.open({
    type: 1,
    content: str
  });
});
$('#myselfinfo').click(function(){
	var  idds=$(this).attr('data-id');
		$.ajax({
			type:'POST',
            url:'http://www.dz.com/admin/Aduser/myinfo',
            data:{id:idds},
			 success: function(data){
			 switch (data.status){
                            case 1:
							
									layer.open({
		type: 1,
		area: ['500px','400px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		value:data.username,
		title: '个人信息',
		skin: 'layui-layer-rim',
		
		content: 
		 // $(data).each(function(index,val){

		'<table class="table table-border table-bordered table-hover" style="margin-top: 20px"><thead><tr><th width="20%">类别</th><th>描述</th></tr></thead><tbody> <tr><th width="20%">用户名</th> <td>王小贱</td></tr> <tr> <th width="20%">性别</th>  <td>男</td> </tr><tr> <th width="20%">邮箱</th>   <td>2570998610@qq.com</td> </tr> <tr> <th width="20%">电话</th> <td>15888888888</td>  </tr>  <tr>  <th width="20%">用户说明</th>   <td>测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测试数据大师傅测大师傅的萨芬 </td>  </tr>  <tr> <th width="20%">角色</th> <td>设计师</td></tr></tbody></table>'
		 // var uli="<li><b class='c"+val.class+"'>"+val.type+"</b><a href='http://www.laixu.com/index/index/wish/id/"+val.Id+".html' class='p'><p>"+val.content+"</p></a><span>&nbsp;"+val.fromname+"&nbsp;&nbsp;<br/>"+val.fromname+"</span></li>";
                   // $('#wishu').append(uli);
               // });
	});
		
                            break;
                            case 2:
                               ;
                                break;
                        }
		
            },
            error:function(data) {
                alert('未知错误');
            },
		});

	});
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}


</script>


<!--此乃百度统计代码，请自行删除-->
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>