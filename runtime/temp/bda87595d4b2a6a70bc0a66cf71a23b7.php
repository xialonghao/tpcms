<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:25:"./admintpl/adrecover.html";i:1506425482;}*/ ?>
<!DOCTYPE HTML>
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
<title>Hi，H-ui v3.1</title>
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
				<span class="c-gray">广告回收站</span>
			</div>
		</nav>
		<div class="container ui-sortable">
			<h1>广告回收站</h1> 
			<div class="panel panel-default">
				<div class="panel-header clearfix">
				<span class="btn btn-danger radius"  id="del_law_all">批量删除</span>
					<a type="button" class="btn btn-success radius" id="back_rule_all">一键还原</a>
					
					<span class="f-r">
					<form action="<?php echo url('Ad/adrecover'); ?>" method="post" style="float: right;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入关键字" name="content" value="<?php if(!(empty($val) || (($val instanceof \think\Collection || $val instanceof \think\Paginator ) && $val->isEmpty()))): ?><?php echo $val; endif; ?>">
		<button type="submit" class="btn btn-success" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</form>
</span>
				</div>
				<div class="panel-body">
					<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th width="25"><input type="checkbox" id="check_law_all"/></th>
						<th width="80">ID</th> 
						<th width="100">广告名</th>
						<th width="150">内容</th>
						<th width="70">状态</th>
						<th width="100">操作</th>
					</tr>
				</thead>
			            <tbody>
			            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
					<tr class="text-c">
						<td><input type="checkbox"  class="ids" value="<?php echo $list['id']; ?>" /></td>
						<td><?php echo $list['id']; ?></td> 
						<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')"><?php echo $list['brand']; ?></u></td>
						<td><?php echo $list['content']; ?></td>
						<td class="td-status"><span class="label label-danger radius">已删除</span></td>
						<td class="td-manage">
							<!-- <a style="text-decoration:none" href="<?php echo url('Ad/reback',['id'=>$list['id']]); ?>" class="ml-5 btn btn-success radius size-MINI"  onClick="member_huanyuan(this,'1')" title="还原">还原</a>  -->
							<input class="ml-5 btn btn-success radius size-MINI huanyuan" iddel="<?php echo $list['id']; ?>" type="button" value="还原">
							<!-- <a title="删除" href="<?php echo url('Ad/delad',['id'=>$list['id']]); ?>" onclick="member_del(this,'1')" class="ml-5 btn btn-danger radius size-MINI" style="text-decoration:none">删除</a> -->
							<input class="btn btn-danger radius size-MINI subbut" iddel="<?php echo $list['id']; ?>" type="button" value="删除">
						</td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
    				</table>
    				
      			</div>
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
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery-ui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>


<script type="text/javascript">
	//删除
    $('.subbut').click(function(){
    	var id=$(this).attr('iddel');
    	<!-- alert(id); -->
        $.ajax({
            url:"<?php echo url('Ad/ajax_delad'); ?>",
            type:'POST',
            data:{id:id},
            success:function(result){
                <!-- alert(result.msg); -->
                switch(result.status){
                   case 1:
                                alert(result.msg);
                                setInterval(function () {
                                    location.href="<?php echo url('Ad/adrecover'); ?>";
                                },2000);

                            break;

                    case 2 :alert(result.msg);
                        break;
				}
            },
            error:function(result){
            	alert('fail');
            	
            }
        });
    });
	//还原
	$('.huanyuan').click(function(){
    	var id=$(this).attr('iddel');
    	<!-- alert(id); -->
        $.ajax({
            url:"<?php echo url('Ad/ajax_reback'); ?>",
            type:'POST',
            data:{id:id},
            success:function(result){
                <!-- alert(result.msg); -->
                switch(result.status){
                   case 1:
                                alert(result.msg);
                                setInterval(function () {
                                    location.href="<?php echo url('Ad/adrecover'); ?>";
                                },2000);

                            break;

                    case 2 :alert(result.msg);
                        break;
                }
            },
            error:function(result){
            	alert('fail');
            	
            }
        });
    });
	//全选
    $('#check_law_all').click(function(){
 		if($(this).is(':checked',true)){
 			$('.ids').prop('checked',true);
 		}else{
 			$('.ids').prop('checked',false);
 		}
 	});
	//选中删除
 	$('#del_law_all').click(function(){
	
	var mymessage=confirm("你确定要还原吗?");
			if(mymessage==true) {
				var idds = '';
				$('.ids').each(function () {
					if ($(this).is(':checked')) {
						idds += $(this).val() + ',';
					}
				});
				if (idds == '') {
					return false;
				}
				idds = idds.substr(0, idds.length - 1);
				$.ajax({
					url: "<?php echo url('Ad/ajax_delad'); ?>",
					type: "POST",
					data: {id: idds},
					success: function (){
						location.href="<?php echo url('Ad/adrecover'); ?>";
					},
					error: function () {
						alert('失败');
					},
				});
			}
	});	
	//选中还原
	$('#back_rule_all').click(function(){
			var idds='';
			$('.ids').each(function(){
				if($(this).is(':checked')){
					idds+=$(this).val()+',';
				}
			});
			idds=idds.substr(0,idds.length-1);
			$.ajax({
				url:"<?php echo url('Ad/ajax_reback'); ?>",
				type:'POST',
				data:{id:idds},
				success:function(iddd){
				alert('succ');
						switch(iddd.status){
						case 1:alert(iddd.msg);
						location.href="<?php echo url('Ad/adrecover'); ?>";
						break;
						case 2:alert(iddd.msg);
						location.href="<?php echo url('Ad/adrecover'); ?>";
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

<!-- <script> -->
        <!-- $('#reback_rule_all').click(function(){ -->
			<!-- var mymessage=confirm("你确定要还原吗?"); -->
			<!-- if(mymessage==true) { -->
				<!-- var idds = ''; -->
				<!-- $('.ids').each(function () { -->
					<!-- if ($(this).is(':checked')) { -->
						<!-- idds += $(this).val() + ','; -->
					<!-- } -->
				<!-- }); -->
				<!-- if (idds == '') { -->
					<!-- return false; -->
				<!-- } -->
				<!-- idds = idds.substr(0, idds.length - 1); -->
				<!-- $.ajax({ -->
					<!-- url: "<?php echo url('Member/do_reback'); ?>", -->
					<!-- type: "POST", -->
					<!-- data: {Id: idds}, -->
					<!-- success: function (){ -->
						<!-- window.location.reload(); -->
					<!-- }, -->
					<!-- error: function () { -->
						<!-- alert('删除失败'); -->
					<!-- }, -->
				<!-- }) -->
			<!-- } -->
			<!-- }); -->
<!-- </script> -->

<!-- <script type="text/javascript"> -->
        <!-- $('#check_rule_all').click(function(){ -->
            <!-- if($(this).is(':checked')) { -->
                <!-- $('.ids').prop('checked',true); -->
            <!-- }else{ -->
                <!-- $('.ids').prop('checked',false); -->
            <!-- } -->
        <!-- }); -->
        <!-- $('#delete_rule_all').click(function(){ -->
           <!-- var idds=''; -->
            <!-- $('.ids').each(function(){ -->
                <!-- if($(this).is(':checked')){ -->
                    <!-- idds+=$(this).val()+','; -->
                <!-- } -->
            <!-- }); -->

            <!-- if(idds==''){ -->
            	<!-- alert('请选择删除内容'); -->
            	<!-- location.href="<?php echo url('Ad/adrecover'); ?>"; -->
            <!-- } -->

              <!-- idds=idds.substr(0,idds.length-1); -->
             <!-- window.location.href="/admin.php/Ad/delad/id/"+idds; -->
        <!-- }); -->



        <!-- $('#back_rule_all').click(function(){ -->
           <!-- var idds=''; -->
            <!-- $('.ids').each(function(){ -->
                <!-- if($(this).is(':checked')){ -->
                    <!-- idds+=$(this).val()+','; -->
                <!-- } -->

            <!-- }); -->
            <!-- if(idds==''){ -->
            	<!-- alert('请选择还原内容'); -->
            	<!-- location.href="<?php echo url('Ad/adrecover'); ?>"; -->
            <!-- } -->
              <!-- idds=idds.substr(0,idds.length-1); -->
             <!-- window.location.href="/admin.php/Ad/reback/id/"+idds; -->
        <!-- }); -->
    <!-- </script> -->
</body>
</html>
<!--H-ui前端框架提供前端技术支持 h-ui.net @2017-01-01 -->