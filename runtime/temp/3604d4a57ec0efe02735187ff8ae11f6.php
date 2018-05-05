<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:22:"./admintpl/adlist.html";i:1506408432;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>

<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/lib/Hui-iconfont/1.0.8/iconfont.min.css" />
<!--[if lt IE 9]>
<link href="static/h-ui/css/H-ui.ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style type="text/css">
.ui-sortable .panel-header{ cursor:move}
</style>
<title>广告位列表</title>
<meta name="keywords" content="关键词,5个左右,单个8汉字以内">
<meta name="description" content="网站描述，字数尽量空制在80个汉字，160个字符以内！">
</head>
<body ontouchstart>
 
<div class="containBox"> 
	 
	<div class="wap-container">
		 
		<nav class="breadcrumb">
			<div class="container">
				<i class="Hui-iconfont">&#xe67f;</i>
				<a href="/" class="c-primary">首页</a>
				<span class="c-gray en">&gt;</span>
				<a href="#">广告位</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">广告位列表</span>
			</div>
		</nav>
		<div class="container ui-sortable">
		<br/>
		
		
					 
			<h1>广告位</h1> 
			
			<div class="panel panel-default">
				<div class="panel-header clearfix">
					 <span class="l"><button type="button" id="del_law_all" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</button></span>　<a class="btn btn-primary radius" onclick="window.location.href='addadvert.html'" href="<?php echo url('Ad/adadd'); ?>"><i class="Hui-iconfont">&#xe600;</i> 添加广告</a>
	<form action="<?php echo url('Ad/adlist'); ?>" method="post" style="float: right;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入关键字" name="content" value="<?php if(!(empty($val) || (($val instanceof \think\Collection || $val instanceof \think\Paginator ) && $val->isEmpty()))): ?><?php echo $val; endif; ?>">
		<button type="submit" class="btn btn-success" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索广告</button>
		</form>
				</div>
				
 <div class="Hui-article">
		<article class="cl pd-20">

			
			<div class="mt-10">
				<table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" id="check_law_all" name="" value=""></th>
							<th width="20">ID</th>
							<th width="80">LOGO</th>
							<th width="50">类型</th>
							<th width="120">品牌名称</th>
							<th width="150">品牌标题</th>
							<th width="80">开始时间</th>
							<th width="80">结束时间</th>
							<th width="70">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
						<tr class="text-c">
							<td><input name="" class="ids" type="checkbox" value="<?php echo $v['id']; ?>"></td>
							<td><?php echo $v['id']; ?></td>
							<td ><img src="../temp/gg/jiaju.jpg" width=40%></td>
							<td><?php echo $v['name']; ?></td>
							<td><img title="国内品牌" src=""><?php echo $v['brand']; ?></td>
							
							<td class="text-l"><?php echo $v['title']; ?></td>
							<td><?php echo $v['starttime']; ?></td>
							<td><?php echo $v['endtime']; ?></td>
							<td class="f-14 picture-manage">
						<span>
							<a href="<?php echo url('Ad/adup',['id'=>$v['id']]); ?>" title="编辑"><input class="btn btn-success radius size-MINI" type="button" value="编辑"></a>
						</span>
						<!-- <a href="<?php echo url('Ad/update',['id'=>$v['id']]); ?>" title="删除"> -->
							<!-- <input iddel="<?php echo $v['id']; ?>" class="btn btn-danger radius size-MINI button" type="button" value="删除"> -->
							<input class="btn btn-danger radius size-MINI subbut" iddel="<?php echo $v['id']; ?>" type="button" value="删除">
						<!-- </a> -->
			        </td>

						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						
					</tbody>
				</table>
	</article>
   <!-- <div id="pageNav" class="dataTables_paginate paging_simple_numbers pageNav"><?php echo $page; ?></div> -->
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
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/js/pagenav.cn.js"></script> 
<script type="text/javascript" src="/public/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script src="jQuery.js"></script>

<script type="text/javascript">
    $('.subbut').click(function(){
    	var id=$(this).attr('iddel');
    	<!-- alert(id); -->
        $.ajax({
            url:"<?php echo url('Ad/ajax_update'); ?>",
            type:'POST',
            data:{id:id},
            success:function(result){
                <!-- alert(result.msg); -->
                switch(result.status){
                   case 1:
                                layer.msg(result.msg, {
                                        offset: 't',
                                        anim: 0
                                    });
                                setInterval(function () {
                                    location.href="<?php echo url('Ad/adlist'); ?>";
                                },2000);

                            break;

                    case 2 :layer.msg(result.msg, {
                        offset: 't',
                        anim: 6
                    });
                        break;
                    case 3 :layer.msg(result.msg, {
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
    });
    $('#check_law_all').click(function(){
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
		$.ajax({
            url:"<?php echo url('Ad/ajax_update'); ?>",
            type:'POST',
            data:{id:idds},
            success:function(iddd){
                    switch(iddd.status){
                    case 1:alert(iddd.msg);
					location.href="<?php echo url('Ad/adlist'); ?>";
                    break;
                    case 2:alert(iddd.msg);
					location.href="<?php echo url('Ad/adlist'); ?>";
                    break;
                }
               // alert('正确');
            },
            error:function(){
                alert('错误');
            }
        });
});	
</script>




<!-- <script type="text/javascript"> -->

            <!-- $('#check_law_all').click(function(){ -->
                <!-- if($(this).is(':checked')){ -->
                    <!-- $('.ids').prop('checked',true); -->
                <!-- }else{ -->
                    <!-- $('.ids').prop('checked',false); -->
                <!-- } -->
            <!-- }); -->
            <!-- $('#del_law_all').click(function(){ -->
                <!-- var idds=''; -->
                <!-- $('.ids').each(function(){ -->
                    <!-- if($(this).is(':checked')){ -->
                        <!-- idds+=$(this).val()+','; -->
                    <!-- } -->
                <!-- }); -->
                <!-- idds=idds.substr(0,idds.length-1); -->
				<!-- //alert (idds); -->
                <!-- window.location.href="/admin.php/Ad/update/id/"+idds; -->
            <!-- }); -->

        <!-- </script> -->

</body>
</html>
<!--H-ui前端框架提供前端技术支持 h-ui.net @2017-01-01 -->