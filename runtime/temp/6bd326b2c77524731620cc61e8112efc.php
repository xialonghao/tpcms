<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:26:"./admintpl/listbanner.html";i:1506650710;}*/ ?>
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
<style type="text/css" media="screen">
	/*分页样式*/
	.pagination{text-align:center;margin-top:20px;margin-bottom: 20px;}
	.pagination li{margin:0px 10px; border:1px solid #e6e6e6;padding: 3px 8px;display: inline-block;}
	.pagination .active{background-color: #46A3FF;color: #fff;}
	.pagination .disabled{color:#aaa;}
</style>
<body>
<nav class="breadcrumb">
			<div class="container">
				<i class="Hui-iconfont">&#xe67f;</i>
				<a href="/" class="c-primary">首页</a>
				<span class="c-gray en">&gt;</span>
				<a href="#">数据库管理</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">数据库备份</span>
			</div>
		</nav>
		
		<div class="container ui-sortable">
		
			<h1>数据库备份列表</h1> 
			
			<div class="panel panel-default">
				<div class="panel-header clearfix">
					<span class="l"><button id="del_law_all"  class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i>
 批量删除</button> <a class="btn btn-primary radius" onclick="window.location.href='add_banner.html'" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i>
 添加Banner</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> 
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
			      <tr class="text-c">
			        <th width="40"><input name="" type="checkbox" value=""></th>
			        <th width="80">ID</th>
			        <th width="100">分类</th>
			        <th width="150">banner缩略图</th>
			        <th width="120">图片名称</th>
			        <th width="80">Tags</th>
			        <th width="150">更新时间</th>
			        <th width="60">发布状态</th>
			        <th width="100">操作</th>
			      </tr>
			    </thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
			      <tr class="text-c">
			        <td><input name="" class="ids"  type="checkbox" value="<?php echo $v['id']; ?>"></td>
			        <td  ><?php echo $v['id']; ?></td>
			        <td><?php echo $v['type']; ?></td>
			        <td><span href="#">
						<img src="/public/uploads/<?php echo $v['photo']; ?>" style="width:50px; height:50px" id="fileimg" />
						<!--<img src="temp/jiaju.jpg" height=50% width=50%></a></td>-->
			        <td class="text-l"><span class="maincolor" href="picture-show.html"><?php echo $v['title']; ?></span></td>
			        <td class="text-c"><?php echo $v['shorttitle']; ?></td>
			        <td><?php echo date("Y-m-d h:i:s",$v['pubtime']); ?></td>
			        <td class="picture-status"><span class="label label-success radius"><?php echo !empty($v['static'])?"已发布":"未发布"; ?></span></td>
			        <td class="f-14 picture-manage">
						<span>
							<a href="<?php echo url('up_banner',['id'=>$v['id']]); ?>" title="编辑"><input class="btn btn-success radius size-MINI" type="button" value="编辑"></a>
						</span>
						<span>
						<!-- <?php echo url('System/del_banner',['id'=>$v['id']]); ?> -->
							<a href="javascript:;" onclick="del(this,'<?php echo $v['id']; ?>');" title="删除"><input class="btn btn-danger radius size-MINI" type="button" value="删除"></a>
						</span>
			        </td>
			      </tr>
				  <?php endforeach; endif; else: echo "" ;endif; ?>
						
					</tbody>
						
				</table>
				
<div> 
<?php echo $page; ?>
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
        $('#check_rule_all').click(function(){
            if($(this).is(':checked')){
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
				// alert(idds);
                idds=idds.substr(0,idds.length-1);
				// alert (idds);
         
                // window.location.href="/admin.php/System/del_banner/id/"+idds;
                layer.confirm('确认要删除吗？',function(index){
        $.ajax({
		url: 'http://www.dz.com/admin.php/system/del_banner',
		type: 'POST',
		data: {"id":idds},
		dataType: 'json',

		success: function(msg){
			if(msg){
    		
			layer.msg('删除成功',{time:700},function(){
			$(":checkbox").attr("checked",false);
				window.location.reload();
			});
   			
   			}else{
   				
   			layer.msg('删除失败',{time:700},function(){
     		$(":checkbox").attr("checked",false);
				window.location.reload();
			});
   			}
		},
		error:function(msg) {
   			layer.msg('连接服务器失败',{time:1000});
		},
		});
		});
            });
    </script>
    <script>
    function del(obj,value){
		// alert('1');
	// alert(value);
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
		url: 'http://www.dz.com/admin.php/system/del_banner',
		type: 'POST',
		data: {"id":value},
		dataType: 'json',

		success: function(msg){
			if(msg){
    		
			layer.msg('删除成功',{time:700},function(){
			$(":checkbox").attr("checked",false);
				window.location.reload();
			});
   			
   			}else{
   				
   			layer.msg('删除失败',{time:700},function(){
     		$(":checkbox").attr("checked",false);
				window.location.reload();
			});
   			}
		},
		error:function(msg) {
   			layer.msg('连接服务器失败',{time:1000});
		},
		});
	});
	};
    </script>
</body>
</html>