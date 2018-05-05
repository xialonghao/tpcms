<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:29:"./admintpl/blogroll_list.html";i:1506650551;}*/ ?>
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
	<link href="static/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 6]>
	<script type="text/javascript" src="/public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<style type="text/css">
		.ui-sortable .panel-header{ cursor:move}
	</style>
	<title>Hi，H-ui v3.1</title>
	<meta name="keywords" content="关键词,5个左右,单个8汉字以内">
	<meta name="description" content="网站描述，字数尽量空制在80个汉字，160个字符以内！">
	<script language="JavaScript" type="text/javascript">
        function changeState(isChecked)
        {
            var chk_list=document.getElementsByTagName("input");
            for(var i=0;i<chk_list.length;i++)
            {
                if(chk_list[i].type=="checkbox")
                {
                    chk_list[i].checked=isChecked;
                }
            }
        }
	</script>
</head>
<body ontouchstart>

<div class="containBox">

	<div class="wap-container">

		<nav class="breadcrumb">
			<div class="container">
				<i class="Hui-iconfont">&#xe67f;</i>
				<a href="/" class="c-primary">首页</a>
				<span class="c-gray en">&gt;</span>
				<a href="#">友情链接</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">列表页</span>
			</div>
		</nav>
		<form action="blogroll_list.html" method="post" style="float: right; padding-top: 10px; padding-right:15px; ">
			<input type="text" class="input-text" style="width:250px" placeholder="请输入关键字进行搜索" name="content" value="<?php echo $val; ?>" id="sou" >
			<button type="submit" class="btn btn-success"  name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</form>
		<div class="container ui-sortable">
			<h1>友情链接</h1>
			<div class="panel panel-default">
				<div class="panel-header clearfix">
					<a href="<?php echo url('System/blogroll_add'); ?>"><span class="f-l">
					<input class="btn btn-success radius size-S" type="button" value="添加友情链接"></span></a>
					<span class="f-l" id="del_law_all" style="padding-left:20px"><input class="btn btn-danger radius size-S" type="button" value="批量删除"></span>
					<span class="f-r">共有数据：<?php echo $pages; ?></span>
				</div>
				<div class="panel-body">
					<table class="table table-border table-bordered table-hover">
						<thead>
						<tr>
							<th>
								<input type="checkbox" name="cb" id="check_rule_all">
							<th>链接Id</th>
							<th>网站名称</th>
							<th>图片Logo</th>
							<th>所属分类</th>
							<th>状态</th>
							<th>管理操作</th>

						</tr>
						</thead>
						<tbody>
						<?php if(is_array($listinfo) || $listinfo instanceof \think\Collection || $listinfo instanceof \think\Paginator): if( count($listinfo)==0 ) : echo "" ;else: foreach($listinfo as $key=>$listinfo): ?>
						<tr>
							<th><input type="checkbox" id="checked-1" value="<?php echo $listinfo['Id']; ?>" class="ids"></th>
							<th><?php echo $listinfo['Id']; ?></th>
							<th><?php echo $listinfo['webname']; ?></th>
							<td><img src="/public/uploads/<?php echo $listinfo['photo']; ?>" style="width:30px;height:30px"></td>
							<td><?php echo $listinfo['categories']; ?></td>
							<td><?php echo !empty($listinfo['pass'])?'通过':'审核'; ?></td>
							<td>
								<a href="<?php echo url('System/blogroll_update',['id'=>$listinfo['Id']]); ?>" class="btn btn-success radius size-S">修改</a>

									<a title="删除"  onclick="blogroll_del(this,'<?php echo $listinfo['Id']; ?>');" class="btn btn-danger radius" style="text-decoration:none">删除</a>

							</td>

						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>


						</tbody>
					</table>
					<p id="no"><?php echo $no; ?></p>

				</div>
			</div>
		</div>
		<div align="center" >
							<?php echo $page; ?>

		</div>


	</div>
	<footer class="footer mt-20">
		<div class="container">
			<nav class="footer-nav">
				<a target="_blank" href="http://www.h-ui.net/aboutHui.shtml">关于H-ui</a>
				<span class="pipe">|</span>
				<a target="_blank" href="http://www.h-ui.net/copyright.shtml">软件著作权</a>
				<span class="pipe">|</span>
				<a target="_blank" href="http://www.h-ui.net/juanzeng.shtml">感谢捐赠</a>
			</nav>
			<p>Copyright &copy;2013-2017 H-ui.net All Rights Reserved. <br>
				<a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">京ICP备15015336号-1</a>
				<br>
				未经允许，禁止转载、抄袭、镜像<br>
				用心做站，做不一样的站</p>
		</div>
	</footer>
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
//单个删除
function blogroll_del(obj,value){

	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
		url: 'http://www.dz.com/admin.php/system/blogroll_del',
		type: 'POST',
		data: {'id':value},
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

}
</script>

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
        //alert(idds);
        idds=idds.substr(0,idds.length-1);
//        alert (idds);
        // window.location.href="/admin.php/System/blogroll_del/id/"+idds;
        $.ajax({
		url: 'http://www.dz.com/admin.php/system/blogroll_del',
		type: 'POST',
		data: {'id':idds},
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
</script>
<!-- 搜索操作 -->
<script type="text/javascript">
    $(document).ready(function(){

        $('#sou').blur(function(){
            var data= $(this).val();
            // alert(data);
            $('#sou').val(data);
        });

        (<?php echo $no; ?>==null) ? $('#no').html(<?php echo $no; ?>):$('#no').html();

    });
</script>
</body>
</html>
<!--H-ui前端框架提供前端技术支持 h-ui.net @2017-01-01 -->