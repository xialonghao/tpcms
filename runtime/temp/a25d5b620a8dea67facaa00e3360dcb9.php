<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:24:"./admintpl/newslist.html";i:1507877096;}*/ ?>
﻿<!DOCTYPE HTML>
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
<title>资讯列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		
	 <span class="select-box inline">
		<select name="" class="select">
		   
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select>
		</span> 
		<input type="text" name="" id="" placeholder=" 资讯名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
		<input class="btn btn-danger radius" id="del_law_all" type="button" value="批量删除">
		
		<a class="btn btn-primary radius" data-title="添加资讯" data-href="newsadd.html" onclick="Hui_admin_tab(this)" href="javascript:;">
		<i class="Hui-iconfont">&#xe600;</i> 添加资讯</a>
	</span> 
	<span class="r">共有数据：<strong><?php echo $list['all']; ?></strong> 条</span> 
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25">
					<input type="checkbox" id="checkbox-1"></th>
					<th width="80">ID</th>
					<th>标题</th>
					<th>分类</th>
					<th>来源</th>
					<th>添加时间</th>
					<th>浏览次数</th>
					<th>审核状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			{Think:news limit='3' order='id desc' like='中' sql="select * from  dz_news"}
				<tr class="text-c">
					<td><input type="checkbox" value="<?php echo $info['id']; ?>" class="ids"></td>
					<td><?php echo $v['id']; ?></td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看"><?php echo $v['title']; ?></u></td>
					<td><?php echo $v['shorttitle']; ?></td>
					<td><?php echo $v['source']; ?></td>
					<td><?php echo $v['inputtime']; ?></td>
					<td><?php echo $v['looknum']; ?></td>
					<td class="td-status mainContent">
					 <span class="btn btn-success radius size-MINI radius">已审核</span><?php else: ?><span class="btn btn-danger size-MINI radius">未审核</span>
					</td>
					<td class="f-14 td-manage">

						<a style="text-decoration:none" class="cancel" href="javascript:;" iddel="<?php echo $info['id']; ?>" title="取消">取消</a>

						<a style="text-decoration:none" class="status" href="javascript:;" iddel="<?php echo $info['id']; ?>" title="审核">审核</a>

					<!-- <a style="text-decoration:none" onclick="article_shenhe(this,'10001')" href="javascript:;" title="审核">审核</a> -->
					<a style="text-decoration:none" class="ml-5" onClick="article_edit('内容评论','newspage.html','10001')" href="<?php echo url('News/newspage',['id'=>$info['id']]); ?>" title="评论">
						<i class="Hui-iconfont">&#xe622;</i>
					</a>
					<a style="text-decoration:none" class="ml-5" onClick="article_edit('','newsup.html','10001')" href="<?php echo url('News/newsup',['id'=>$info['id']]); ?>"  title="编辑">
						<i class="Hui-iconfont">&#xe6df;</i>
					</a>
					<!-- <input class="btn btn-danger radius size-MINI subbut" iddel="<?php echo $info['id']; ?>" type="button" value="删除"> -->
					 <a style="text-decoration:none" class="subbut" iddel="<?php echo $info['id']; ?>" href="javascript:;" title="删除">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a> 
					</td>
				</tr>
				{/Think:news}
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
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 不参与排序的列 8是调试有几列th
	]
});
</script> 
<script type="text/javascript">
////////////////////////////审核////////////////////////
	 $('.status').click(function(){
    	var id=$(this).attr('iddel');
    	//alert(id);
    	layer.confirm('确认审核',function(index){
        $.ajax({
            url:"<?php echo url('News/statu'); ?>",
            type:'POST',
            data:{id:id},
            success:function(result){
                //alert(result.msg);
                switch(result.status){
                   case 1:
                	layer.msg('审核成功', {icon: 1,time:1500});
                	setTimeout("location.reload();",1500);
					//setTimeout("location.href(<?php echo url('News/newslist'); ?>);",1000);
				break;
                    case 2 :layer.msg(result.msg, {
                        offset: 't',
                        anim: 6
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

////////////////////////////取消////////////////////////
	 $('.cancel').click(function(){
    	var id=$(this).attr('iddel');
    	//alert(id);
    	layer.confirm('确认取消',function(index){
        $.ajax({
            url:"<?php echo url('News/cancel'); ?>",
            type:'POST',
            data:{id:id},
            success:function(result){
                //alert(result.msg);
                switch(result.status){
                   case 1:
                   layer.msg(result.msg, {
						  icon: 1,
						  time: 1000 
						}, function(){
						setTimeout("location.reload();",1000);
					}); 
				break;
                    case 2 :layer.msg(result.msg, {
                        offset: 't',
                        anim: 6
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
////////////////////////////删除////////////////////////
    $('.subbut').click(function(){
    	   	var id=$(this).attr('iddel');
    	//alert(id);
    	layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo url('News/newsdel'); ?>",
            type:'POST',
            data:{id:id},
            success:function(result){
                //alert(result.msg);
                switch(result.status){
                   case 1:
                   layer.msg(result.msg, {
						  icon: 1,
						  time: 1000 
						}, function(){
						setTimeout("location.reload();",1000);
					}); 
                break;
                    case 2 :layer.msg(result.msg, {
                        offset: 't',
                        anim: 6
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
	   layer.confirm('确认要删除吗？',function(index){
		$.ajax({
            url:"<?php echo url('News/newsdel'); ?>",
            type:'POST',
            data:{id:idds},
            success:function(result){
                    switch(result.status){
                    case 1:
                   layer.msg(result.msg, {
                          icon: 1,
                          time: 1000 
                        }, function(){
                         location.href="<?php echo url('News/newslist'); ?>";
                    }); 
                    break;
                    case 2:
                   layer.msg(result.msg, {
                          icon: 2,
                          time: 1000 
                        }, function(){
                        location.href="<?php echo url('News/newslist'); ?>";
                    });
                    break;
                    
                }
               // alert('正确');
            },
            error:function(){
               layer.msg('未选中任何信息', {icon: 2,time:1000});
            }
        });
	});
});	
</script>
</body>
</html>