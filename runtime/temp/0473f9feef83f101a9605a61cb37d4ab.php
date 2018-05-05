<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:26:"./admintpl/system_log.html";i:1506649678;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/public/lib/html5shiv.js"></script>
	<script type="text/javascript" src="/public/lib/respond.min.js"></script>
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
	<title>数据库管理</title>
</head>
<body>
<nav class="breadcrumb">
	<div class="container">
		<i class="Hui-iconfont">&#xe67f;</i>
		<a href="/" class="c-primary">首页</a>
		<span class="c-gray en">&gt;</span>
		<a href="#">系统设置</a>
		<span class="c-gray en">&gt;</span>
		<span class="c-gray">系统日志</span>
	</div>
</nav>

<div class="container ui-sortable">

	<h1>系统日志列表</h1>

	<div class="panel panel-default">
		<div class="panel-header clearfix">
		<span class="l">
			<button  id="del_all" class="btn btn-danger radius">
				<i class="Hui-iconfont">&#xe6e2;</i> 批量删除
			</button>
		</span>
			<span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span>
			<!-- <span class="r">共有数据：<strong>88<> 条</span> -->
					<span class="r">
		</div>
		<!-- <div class="panel-header clearfix">
            <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a></span>
            <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 添加管理员</a></span>
            <span class="r">共有数据：<strong>54</strong> 条</span>
        </div> -->
		<div class="panel-body">

			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
				<!-- <tr> -->
				<!-- <th scope="col" colspan="8">导航列表</th> -->
				<!-- </tr> -->
				<tr class="text-c">
					<th width="150"><input type="checkbox" name="" value=""></th>
					<th width="150">ID</th>
					<th width="200">类型</th>
					<th width="200">内容</th>
					<th width="200">用户名</th>
					<th width="180">客户端IP</th>
					<th width="150">时间</th>
					<th width="200">操作</th>
				</tr>
				</thead>
				<tbody>
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
				<tr class="text-c">
					<td>
						<input type="checkbox" value="<?php echo $list['Id']; ?>" name="" class="ids">
					</td>
					<td><?php echo $list['Id']; ?></td>
					<td><?php echo $list['type']; ?></td>
					<td><?php echo $list['content']; ?></td>
					<td><?php echo $list['username']; ?></td>
					<td><?php echo $list['ip']; ?></td>
					<td><?php echo date("Y-m-d",$list['time']); ?></td>
					<td>
						<a title="详情" href="javascript:;" onclick="system_user_show('详情','system_user_show?id=<?php echo $list['Id']; ?>','800','500')" class="ml-5" style="text-decoration:none">
							<i class="Hui-iconfont">&#xe665;</i>
						</a>
						<!--<a href="<?php echo url('System/system_log_del',['id'=>$list['Id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><i class="Hui-iconfont">&#xe6e2;</i></a>



                        <a class="submit" onclick="dian();" id="dian" value="" iddel="<?php echo $list['Id']; ?>" onclick="return submitcheck()" type="button">
                            <i class="Hui-iconfont">&#xe6e2;</i>
                        </a>-->
						<a title="删除" href="javascript:;" onclick="system_log_del(this,<?php echo $list['Id']; ?>)" class="ml-5" style="text-decoration:none">
							<i class="Hui-iconfont">&#xe6e2;</i>
						</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>

			<div id="pageNav" class="pageNav">
			</div>
		</div>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
	<script type="text/javascript" src="/public/static/h-ui/js/H-ui.min.js"></script>
	<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="/public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
	<script type="text/javascript" src="/public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/public/lib/laypage/1.2/laypage.js"></script>
	<script type="text/javascript">
	/*查看日志*/
	function system_user_show(title,url,w,h){
	layer_show(title,url,w,h);
}
	//function system_log_show(obj,value){
	//alert(value);

	//	$.ajax({
	//		type: 'POST',
	//		url: 'http://www.dzcms.com/admin.php/user_show',
	//		data: {value:value},
	//		dataType: 'json',
	//	});
	//location.href="http://www.dzcms.com/system_user_show?value="+value;
	//}
	/*批量删除*/
	$('#del_all').click(function(){
	var idds='';
	$('.ids').each(function() {
	if($(this).is(':checked')){
	idds+=$(this).val()+',';
	}
	});
	idds=idds.substr(0,idds.length-1);
	layer.confirm('确认要删除吗？',function(index){

			//alert(idds);
	// window.location.href="http://www.dzcms.com/admin.php/system/system_log_del_all/id/"+idds;

	$.ajax({
	url: 'http://www.dzcms.com/admin.php/system/system_log_del_all',
	type: 'POST',
	data: {"value":idds},
	dataType: 'json',

	success: function(msg){
	switch(msg.case){
	case 1:
	window.location.reload();
	$(":checkbox").attr("checked",false);
	layer.msg('已删除!',{icon:1,time:1000});
	break;

	case 2:
	layer.msg(msg.msg, function(){
	});
	break;
	}
	},
	error:function(msg) {
	console.log(data.msg);
	},
	});


	});
	});
	/*日志-删除*/
	function system_log_del(obj,value){
	//alert(value);
	layer.confirm('确认要删除吗？',function(index){
	$.ajax({
	url: 'http://www.dzcms.com/admin.php/system/system_log_del',
	type: 'POST',
	data: {"value":value},
	dataType: 'json',

	success: function(msg){
	switch(msg.case){
	case 1:
	$(obj).parents("tr").remove();
	layer.msg('已删除!',{icon:1,time:1000});
	break;

	case 2:
	layer.msg(msg.msg, function(){
	});
	break;
	}
	},
	error:function(msg) {
	console.log(data.msg);
	},
	});
	});
	}
	</script>
	<script type="text/javascript">
		$('.table-sort').dataTable({
			"aaSorting": [[ 1, "desc" ]],//默认第几个排序
			"bStateSave": true,//状态保存
			"pading":false,
			"aoColumnDefs": [
				//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
				{"orderable":false,"aTargets":[0,6]}// 不参与排序的列
			]
		});

		/*资讯-添加*/
		function article_add(title,url,w,h){
			var index = layer.open({
				type: 2,
				title: title,
				content: url
			});
			layer.full(index);
		}
		/*资讯-编辑*/
		function article_edit(title,url,id,w,h){
			var index = layer.open({
				type: 2,
				title: title,
				content: url
			});
			layer.full(index);
		}
		/*资讯-删除*/
		function article_del(obj,id){
			layer.confirm('确认要删除吗？',function(index){
				$.ajax({
					type: 'POST',
					url: '',
					dataType: 'json',
					success: function(data){
						$(obj).parents("tr").remove();
						layer.msg('已删除!',{icon:1,time:1000});
					},
					error:function(data) {
						console.log(data.msg);
					},
				});
			});
		}

		/*资讯-审核*/
		function article_shenhe(obj,id){
			layer.confirm('审核文章？', {
						btn: ['通过','不通过','取消'],
						shade: false,
						closeBtn: 0
					},
					function(){
						$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
						$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
						$(obj).remove();
						layer.msg('已发布', {icon:6,time:1000});
					},
					function(){
						$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
						$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
						$(obj).remove();
						layer.msg('未通过', {icon:5,time:1000});
					});
		}
		/*资讯-下架*/
		function article_stop(obj,id){
			layer.confirm('确认要下架吗？',function(index){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
				$(obj).remove();
				layer.msg('已下架!',{icon: 5,time:1000});
			});
		}

		/*资讯-发布*/
		function article_start(obj,id){
			layer.confirm('确认要发布吗？',function(index){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
				$(obj).remove();
				layer.msg('已发布!',{icon: 6,time:1000});
			});
		}
		/*资讯-申请上线*/
		function article_shenqing(obj,id){
			$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
			$(obj).parents("tr").find(".td-manage").html("");
			layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
		}

	</script>
</body>
</html>