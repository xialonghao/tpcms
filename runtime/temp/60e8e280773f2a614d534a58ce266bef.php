<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:26:"./admintpl/admin_list.html";i:1506134819;}*/ ?>
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
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c" style="height: 24px;">

		<form action="/admin-list.html" method="post" style="float: right;">
			<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" name="content" value="<?php if(!(empty($val) || (($val instanceof \think\Collection || $val instanceof \think\Paginator ) && $val->isEmpty()))): ?><?php echo $val; endif; ?>">
			<button type="submit" class="btn btn-success" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="admin_del(this,'many')" class="btn btn-danger radius">
				<i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a href="javascript:;" onclick="admin_add('添加管理员','admin-add','800','500')" class="btn btn-primary radius">
				<i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
		</span>
		<span class="r">共有数据：<strong><?php echo $num; ?></strong> 条</span>
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="10">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" id="rule_check_all" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="35">性别</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" class="check_ids" value="<?php echo $vo['id']; ?>"></td>
				<td><?php echo $vo['id']; ?></td>
				<td><?php echo $vo['username']; ?></td>
				<td><?php echo !empty($vo['sex'])?"男":"女"; ?></td>
				<td><?php echo $vo['telphone']; ?></td>
				<td><?php echo $vo['email']; ?></td>
				<td><?php echo $vo['role']; ?></td>
				<td><?php echo date("Y-m-d H:i",$vo['inputtime']); ?></td>
				<td class="td-status"><span class="label radius<?php if($vo['status']): ?> label-success<?php else: ?> label-default<?php endif; ?>"><?php echo !empty($vo['status'])?"已启用":"已禁用"; ?></span></td>
				<td class="td-manage">
					<?php if($vo['status']): ?>
					<a style="text-decoration:none" id="status" onClick="admin_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
					<?php else: ?>
					<a style="text-decoration:none" id="status" onClick="admin_start(this,<?php echo $vo['id']; ?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>
					<?php endif; ?>
					<a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-update?aid=<?php echo $vo['id']; ?>','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除" href="javascript:;" onclick="admin_del(<?php echo $vo['id']; ?>,'one')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<?php echo $page; ?>
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
/*批量选择*/
$(function () {
	$('#rule_check_all').click(function(){
		if($(this).is(':checked')){
			$('.check_ids').prop('checked',true);
		}else{
			$('.check_ids').prop('checked',false);
		}
	});
})
/*管理员-增加*/
function admin_add(title,url,w,h){
    layer_show(title,url,w,h);
}
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(a,num){
	layer.confirm('确认要删除吗？',function(index){
		//获取选中的信息的id
        var rule_id = '';
        $('.check_ids').each(function(){
            if($(this).is(':checked')){
                rule_id += $(this).val()+',';
            }
        });
        if(num=='one'){
            rule_id = a;
        }
        if(num=='many'){
            rule_id = rule_id.substr(0,rule_id.length-1);
            if(!rule_id){
                layer.msg('请选择要删除的数据!',{icon:3,time:1000});
                return;
			}
		}
        //请求后台
        $.ajax({
			type:'POST',
			url:'/aduser_delete',
			data:{list:rule_id},
			success: function(data){
				layer.msg('已删除!',{icon:1,time:1000},function () {
                    history.go(0);
                });
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

/*管理员-停用*/
function admin_stop(obj,id){
    var uid = id;
    layer.confirm('确认要停用吗？',function(index){
        //请求后台
        $.ajax({
            url:"/aduser_change_status",
            type:"POST",
            data:'status=0&id='+uid,
            success:function(data){
                //成功后的前台处理
                var id = data;

				var node = '<a onClick="admin_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>'
                $(obj).parents("tr").find(".td-manage").prepend(node);
                $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
                $(obj).remove();
                layer.msg('已停用!',{icon: 5,time:1000});
            },
            error:function(data){
                console.log(data);
            }
        });
    });
}

/*管理员-启用*/
function admin_start(obj,id){
    var uid = id;
    layer.confirm('确认要启用吗？',function(index){
        //请求后台
        $.ajax({
            url:"/aduser_change_status",
            type:"POST",
            data:'status=1&id='+uid,
            success:function(data){
                //成功后的前台处理
				var id = data;
                var node = '<a onClick="admin_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>'
                $(obj).parents("tr").find(".td-manage").prepend(node);
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!', {icon: 6,time:1000});
            },
            error:function(data){
                console.log(data);
            }
        });
    });
}

</script>
</body>
</html>