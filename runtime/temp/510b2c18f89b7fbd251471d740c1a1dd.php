<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:27:"./admintpl/huishouzhan.html";i:1506338378;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="./public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="./public/lib/Hui-iconfont/1.0.8/iconfont.min.css" />
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
<title>回收站列表</title>
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
				<a href="#">客服管理</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">客服回收站</span>
			</div>
		</nav>
		<div class="container ui-sortable">
			<h1>客服回收站</h1> 
			<div class="panel panel-default">
				<div class="panel-header clearfix">
					<span class="f-l"><button id="del_law" class="btn btn-success radius">全部还原</button>　<button class="btn btn-danger radius"  id="del_law_all" type="button">全部删除</button></span>
				</div>
				<div class="panel-body">
					<table class="table table-border table-bordered table-hover ">
      					 <thead>
			              <tr  class="text-c">
			              	<th><input type="checkbox" id="check_rule_all" class="tpl-table-fz-check"></th>
			                <th>序列号</th>
			                <th>姓名</th>
			                <th>QQ号码</th>
			                <th>性别</th>
			                <th>上次会话时间</th>
			                <th>操作</th>
			                
			              </tr>
			            </thead>
			            <tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
			              <tr  class="text-c">
			                <th><input type="checkbox" value="<?php echo $list['Id']; ?>" class="ids"></th>
			                <th><?php echo $list['Id']; ?></th>
			                <td><?php echo $list['name']; ?></td>
			                <td><?php echo $list['qq']; ?></td>
			                <td><?php if($list['sex'] == '1'): ?> 男 <?php else: ?>女<?php endif; ?></td>
			                <td>1999.03.01</td>
			                <td><a href="<?php echo url('System/del_user',['id'=>$list['Id']]); ?>" class="btn btn-danger radius" type="button" >彻底删除</a>　<a  href="<?php echo url('System/huifu',['id'=>$list['Id']]); ?>" class="btn btn-success radius">还原</a></td>
			              </tr>
						  <?php endforeach; endif; else: echo "" ;endif; ?>
			             
			            </tbody>
    				</table>
				</div>
			</div>
			       
			 
		</div>


						<div>
						<?php echo $page; ?>
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

<script type="text/javascript" src="./public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="./public/lib/jquery-ui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="./public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="./public/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="./public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="./public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="./public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
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
                idds=idds.substr(0,idds.length-1);
				//alert (idds);
                window.location.href="/admin.php/System/del_user/id/"+idds;
		

            });
			 $('#del_law').click(function(){
                var idds='';
                $('.ids').each(function(){
                    if($(this).is(':checked')){
                        idds+=$(this).val()+',';
                    }
                });
                idds=idds.substr(0,idds.length-1);
				//alert (idds);
               
				window.location.href="/admin.php/System/huifu/id/"+idds;

            });
			
    </script>
	<style>
	/*分页样式*/
	.pagination{text-align:center;margin-top:20px;margin-bottom: 20px;}
	.pagination li{margin:0px 10px; border:1px solid #e6e6e6;padding: 3px 8px;display: inline-block;}
	.pagination .active{background-color: #46A3FF;color: #fff;}
	.pagination .disabled{color:#aaa;}
</style>


</body>
</html>
<!--H-ui前端框架提供前端技术支持 h-ui.net @2017-01-01 -->