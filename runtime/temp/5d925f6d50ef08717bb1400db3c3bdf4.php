<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:23:"./admintpl/listnav.html";i:1507467657;}*/ ?>
<!DOCTYPE HTML>
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
<script type="text/javascript" src="/public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title>资讯列表</title>
</head>
<body>
<nav class="breadcrumb">
			<div class="container">
				<i class="Hui-iconfont">&#xe67f;</i>
				<a href="/" class="c-primary">首页</a>
				<span class="c-gray en">&gt;</span>
				<a href="#">导航</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">导航列表</span>
			</div>
		</nav>
		<div class="container ui-sortable">
			<h1>导航列表</h1> 
			<div class="panel panel-default">
				<div class="panel-header clearfix">
					<span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>
					<a href="<?php echo url('Nav/addnav'); ?>"  class="btn btn-primary radius"><i class="icon-plus"></i> 添加导航</a></span>
					<!-- <span class="r">共有数据：<strong>88<> 条</span> -->
					<span class="r"><a href="javascript:;" onclick="window.location.href='renav.html'" class="btn btn-danger radius"><i class="icon-trash"></i>进入回收站</a></span>
				 </div>
				<!-- <div class="panel-header clearfix">
					<span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a></span>
					<span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 添加管理员</a></span>
					<span class="r">共有数据：<strong>54</strong> 条</span>
				</div> -->
				<div class="panel-body">
   <table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr>
					        <th >导航列表</th>
					    </tr>
						<tr class="text-c">
							<th width="150"><input type="checkbox" name="" value=""></th>
							<th width="150">ID</th>
							<th width="200">导航名字</th>
							<th width="200">描述</th>
							<th width="200">级别</th>
							<th width="180">上级导航</th>
							<th width="150">是否在导航栏显示</th>
							<th width="200">操作</th>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$datas): ?>
						<tr class="text-c">
							<td><input type="checkbox" value="1" name=""></td>
							<td><?php echo $datas['Id']; ?></td>
							<td><?php echo $datas['name']; ?><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')"></u></td>
							<td><?php echo $datas['description']; ?></td>
							<td><?php echo $datas['level']; ?></td>
							<td><?php echo $datas['top']; ?></td>
							<td><?php echo !empty($datas['show'])?"显示":"不显示"; ?></td>
							<td class="f-14 picture-manage">
								<span>
									<a href="<?php echo url('Nav/upnav',['Id'=>$datas['Id']]); ?>" title="编辑"><input class="btn btn-success radius size-MINI" type="button" value="编辑"></a>
								</span>
								<span>
									<a title="删除" href="<?php echo url('Nav/do_delnav',['Id'=>$datas['Id']]); ?>"><input type="button" class="btn btn-danger radius size-MINI nav_del" value="删除"></a>
								</span>
			        		</td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
<div id="pageNav" class="pageNav"> 
</div>
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
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,5]}// 不参与排序的列
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
/*导航-删除*/

$(".nav_del").click(function(){
	var flag=confirm('确认要删除吗？');
	if(flag)
	{
		$.ajax({
			type:'POST',
			url:'http://www.dz.com/admin.php/Nav/do_delnav',
			dataType:'json',
			data:{id:id},
			success:function(result){
				$("#nav_del"+id).remove();
				
			},
			error:function(result){
			alert('111');
			},

		});
	
	}

});



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