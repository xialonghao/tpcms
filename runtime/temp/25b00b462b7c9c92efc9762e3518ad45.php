<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:28:"./admintpl/templet_page.html";i:1508372761;}*/ ?>
﻿<!--_meta 作为公共模版分离出去-->
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
	<nav class="breadcrumb">
			<div class="container">
				<i class="Hui-iconfont">&#xe67f;</i>
				<a href="/" class="c-primary">首页</a>
				<span class="c-gray en">&gt;</span>
				<a href="#">栏目管理</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">选择模板</span>
			</div>
		</nav>
		<div class="container ui-sortable">
			<h1>选择模板</h1>
			<div class="panel panel-default">
				<div class="panel-header clearfix">
					<span class="f-l">模板风格</span>
					<span class="f-r"></span>
				</div>


				<!-- 下拉开始 -->
				
			<div class="panel panel-default" style="width:1000px;margin:20px auto ; border:none;">
				<form action="<?php echo url('Aduser/add_style'); ?>" method="post" class="form form-horizontal responsive" id="demoform">
					<span class="select-box" style="width:120px;margin-left:180px;border:0px solid #ff0000">	可用风格：</span>
					<span class="select-box" style="width:160px">
  <select class="select" size="1" name="styles" style="border:0px solid red;width:150px" id="fengge">
	  <?php if(is_array($xueze) || $xueze instanceof \think\Collection || $xueze instanceof \think\Paginator): if( count($xueze)==0 ) : echo "" ;else: foreach($xueze as $key=>$val): ?>
	  	<option  value="0" value="<?php echo $val; ?>"><?php echo $val; ?></option>
	  <?php endforeach; endif; else: echo "" ;endif; ?>

  </select>
</span>

					<br/><br/><br/>
					<input type="submit" value="提交" class="btn btn-success radius" style="width:80px;margin-left:190px"><!--<button class="btn btn-success radius" style="width:80px;margin-left:190px">提交</button>-->
					<button class="btn btn-secondary radius" style="width:80px;margin-left:50px" onclick="history.go(-1);">取消</button>
				</form>

			</div>
				<!-- 下拉结束 -->
					

			</div>

			 
		</div>



	<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.page.js"></script>
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
	  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
	]
});
</script>
	<script type="text/javascript">
		$("#fengge").blur(function(){
		    var name=$(this).val();
		   // alert(name);exit;
		   $.ajax({
				url:"/do_acb  ",
				type:"POST",
				data:{val:name},
                //alert(name);
            success:function(data){
                    var category,list,show;
                    $.each(data,function(key){
                        $.each(data[key],function(i,v){
                            key==='category'?category+='<option>'+v+'</option>':0;
                            key==='list'?list+='<option>'+v+'</option>>':0;
                            key==='show'?show+='<option>'+v+'</option>>':0;

                        })
                    });
						$('#category').html(category);
					    $('#list').html(list);
					    $('#show').html(show);

                },
				error:function(){}
			});
		});
	</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>