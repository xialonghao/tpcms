<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:24:"./admintpl/catelist.html";i:1508307972;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
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
<title>分类管理</title>

</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	资讯管理
	<span class="c-gray en">&gt;</span>
	分类管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="text-c">
		<input type="text" name="" id="" placeholder="栏目名称、id" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<input class="btn btn-danger radius" id="del_law_all" type="button" value="批量删除">
		<!-- <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> -->
		<a class="btn btn-primary radius" data-title="添加资讯" data-href="<?php echo url('News/cateadds'); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
		<i class="Hui-iconfont">&#xe600;</i> 添加分类</a>
		</span>
		<span class="r">共有数据：<strong><?php echo $catelist['all']; ?></strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25">
					<input type="checkbox" id="checkbox-1"></th>
					<th width="80">ID</th>
					<th>类别名称</th>
					<th>简述</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($catelist) || $catelist instanceof \think\Collection || $catelist instanceof \think\Paginator): if( count($catelist)==0 ) : echo "" ;else: foreach($catelist as $key=>$catelist): ?>
				<tr class="text-c">
					<td><input type="checkbox" name="" class="ids" value="<?php echo $catelist['id']; ?>"></td>
					<td><?php echo $catelist['id']; ?></td>
					<td><?php echo $catelist['catetitle']; ?></td>
					<td><?php echo $catelist['describe']; ?></td>
					<td><?php echo date("y-m-d",$catelist['inputtime']); ?></td>
					<td class="f-14">
						<a title="编辑" href="javascript:;" onclick="system_category_edit('分类编辑','cateup.html','1','700','480')" style="text-decoration:none">
						<a href="<?php echo url('News/cateup',['id'=>$catelist['id']]); ?>"><i class="Hui-iconfont">&#xe6df;</i></a>
						</a>
						<a style="text-decoration:none" class="subbut" iddel="<?php echo $catelist['id']; ?>" href="javascript:;" title="删除">
						<i class="Hui-iconfont">&#xe6e2;</i>
						</a> 
			<!-- 			<input class="btn btn-danger radius size-MINI subbut" iddel="<?php echo $catelist['id']; ?>" type="button" value="删除"> -->
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
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.js"></script>

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
 $('.table-sort').dataTable({
 	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
 	"bStateSave": true,//状态保存
 	"aoColumnDefs": [
 	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
 	  {"orderable":false,"aTargets":[0,4]}// 制定列不参与排序
 	]
 });
/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-删除*/
function system_category_del(obj,id){
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
</script>
<script type="text/javascript">
////////////////////////////删除////////////////////////
    $('.subbut').click(function(){
    	var id=$(this).attr('iddel');
    	//alert(id);
    	layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('News/catedel'); ?>",
            type:'POST',
            data:{id:id},
            success:function(result){
                //alert(result.msg);
                switch(result.status){
                   case 1:
                        layer.msg(result.msg, {
                         icon: 1,
						 time: 1000 
                    });
                    setTimeout("location.reload();",1000);
                    break;
                    case 2 :layer.msg(result.msg, {
                        icon: 1,
						time: 1000 
                    });
                        break;
                    case 3 :layer.msg(result.msg, {
                         icon: 2,
						 time: 1000 
                    });
                        break;
                }
            },
            error:function(result){
            	alert('fail');
            	
            }
        });
    	})
    });
////////////////////////////全选删除////////////////////////
    $('#checkbox-1').click(function(){
 		if($(this).is(':checked',true)){
 			$('.ids').prop('checked',true);
 		}else{
 			$('.ids').prop('checked',false);
 		}
 	});
 	$('#del_law_all').click(function(){
		var idds='';
		$('.ids').each(function(){
			if($(this).is(':checked')){
				idds+=$(this).val()+',';
			}
		});
		idds=idds.substr(0,idds.length-1);
		//alert(idds);
		// window.location.href="/admin.php/Navigation/nav_del/Id/"+idds;
		// 
		layer.confirm('确认要删除吗？',function(index){
		$.ajax({
            url:"<?php echo url('News/do_first_del'); ?>",
            type:'POST',
            data:{id:idds},
            success:function(result){
                //alert(result.msg);
                switch(result.status){
                   case 1:
                   layer.msg(result.msg, {
						  icon: 1,
						  time: 1000 
						}, function(){
						 location.href="<?php echo url('News/catelist'); ?>";
					}); 
                break;
                    case 2 :
                   layer.msg(result.msg, {
						  icon: 2,
						  time: 1000 
						}, function(){
						 location.href="<?php echo url('News/catelist'); ?>";
					}); 
                break;
                }
            },
            error:function(){
 					layer.msg('未选中任何信息', {icon: 2,time:1000});
            }
        });
	})
});	
</script>
</body>
</html>