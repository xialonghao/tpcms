<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./admintpl/user_grade_list.html";i:1506822111;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/public/lib/html5shiv.js"></script>
<script type="text/javascript" src="/public/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/lib/Hui-iconfont/1.0.8/iconfont.min.css" />
<!--[if lt IE 9]>
<link href="/public/static/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="/public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style type="text/css">
.ui-sortable .panel-header{ cursor:move}
</style>
<title>用户列表</title>
<meta name="keywords" content="关键词,5个左右,单个8汉字以内">
<meta name="description" content="网站描述，字数尽量空制在80个汉字，160个字符以内！">
</head>
<body ontouchstart>


<div class="containBox">
<div class="wap-container">
<nav class="breadcrumb">
	<div class="container">
		<i class="Hui-iconfont">&#xe67f;</i>
		<a href="#" class="c-primary">首页</a>
		<span class="c-gray en">&gt;</span>
		<a href="#">系统管理</a>
		<span class="c-gray en">&gt;</span>
		<span class="c-gray">用户等级</span>
	</div>
</nav>
<div class="container ui-sortable">
<h1>用户等级</h1>
<div class="panel panel-default">
	<div class="panel-header clearfix">
		<div class="btn-group">
	<input type="submit" class="btn btn-danger radius" id="del_law_all" value="批量删除">
		<span onclick="window.location.href='usergradeadd.html'" class="btn btn-success radius">等级添加</span>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-border table-bordered table-hover">
			<tbody>
			  <tr class="text-c">
				<td>
					<input type="checkbox" id="checkbox-1">
				</td>
				<th>ID</th>
				<th>登录名</th>
				<th>邮箱</th>
				<th>角色等级</th>
				<!--<th>状态</th>-->
				<th>加入时间</th>
				<th>操作</th>
			  </tr>
			  <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$info): ?>
			  <tr class="text-c">
				<td>
					<input type="checkbox"  value="<?php echo $info['id']; ?>" class="ids">
				</td>
				<td><?php echo $info['id']; ?></td>
				<td><?php echo $info['nickname']; ?></td>
				<td><?php echo $info['email']; ?></td>
				<td>
					<?php if($info['vipid'] == 1): ?> 游客
					<?php elseif($info['vipid'] == 2): ?>普通VIP
					<?php elseif($info['vipid'] == 3): ?>高级vip
					<?php elseif($info['vipid'] == 4): ?>最高vip
					<?php endif; ?>
				</td>
				<td>
					<?php echo $info['regdate']; ?></th>
				  </td>
				<td>
					<a class="btn radius btn-warning" href="<?php echo url('Member/usergradeup',['Id'=>$info['id']]); ?>">修改</a>
					<input class="btn btn-danger radius del" dataid="<?php echo $info['id']; ?>" type="button" value="删除">
				</td>
			  </tr>
			  <?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
</div>
	  <?php echo $page; ?>
</div>
</div>
</div>
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery-ui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
    $('.del').click(function(){
		var mymessage=confirm("你确定要删除吗?");
		if(mymessage==true) {
			var id = $(this).attr('dataid');
			$.ajax({
				url:"<?php echo url('Member/rankdel'); ?>",
				type: 'POST',
				data: {Id: id},
				success: function () {
					layer.msg('删除成功', {icon: 1,time:1000});
					setTimeout("location.reload();",1000);
				}, error: function () {
					layer.msg('删除失败', {icon: 5,time:1000});
				}
			});
		}
    })
    $('#checkbox-1').click(function(){
        if($(this).is(':checked',true)){
            $('.ids').prop('checked',true);
        }else{
            $('.ids').prop('checked',false);
        }
    });
    $('#del_law_all').click(function(){
		var mymessage=confirm("你确定要删除吗?");
		if(mymessage==true) {
			var idds = '';
			$('.ids').each(function () {
				if ($(this).is(':checked')) {
					idds += $(this).val() + ',';
				}
			});
			idds = idds.substr(0, idds.length - 1);
			$.ajax({
				url: "<?php echo url('Member/rankdel'); ?>",
				type: "POST",
				data: {Id: idds},
				success: function (){
					layer.msg('删除成功', {icon: 1,time:1000});
					setTimeout("location.reload();",1000);
				},
				error: function () {
					layer.msg('删除失败', {icon: 5,time:1000});
				},
			})
			//window.location.href = "/admin.php/Member/rankalldel/Id/" + idds;
		}
	});
</script>
</body>
</html>
<!--H-ui前端框架提供前端技术支持 h-ui.net @2017-01-01 -->