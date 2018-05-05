<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:24:"./admintpl/rebanner.html";i:1506648686;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="./public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="./public/lib/Hui-iconfont/1.0.8/iconfont.min.css" />
<!-- <link rel="stylesheet" type="text/css" href="./public/newjs/layer.css" />
 --><!--[if lt IE 9]>
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
				<a href="#">Banner管理</a>
				<span class="c-gray en">&gt;</span>
				<span class="c-gray">Banner回收站</span>



			</div>
		</nav>
		<div class="container ui-sortable">
			<h1>Banner回收站</h1> 
	<div class="panel panel-default">

	
				<form action="rebanner.html" method="post" style="float: right; padding-top: 10px; padding-right:15px; ">
					<input type="text" class="input-text" style="width:250px" placeholder="请输入关键字进行搜索" name="content" value="<?php echo $val; ?>" id="sou" >
					<button type="submit" class="btn btn-success"  name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
				</form>
	

			<div class="panel-header clearfix">

	
		
		


					 <input type="button" id="pinliangshanchu" value="批量删除"   class="btn btn-danger radius"/>

				  <input type="button" id="dosubmit" value="一键还原"  class="btn btn-success radius"/>

					<span class="f-r"></span>
			
				</div>
				<div class="panel-body">
					<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
					<tr class="text-c">
						<th width="25"><input type="checkbox" class="" name="" value=""></th>
						<th width="80">ID</th>
						<th width="80">标题</th>
						<th width="150">banner</th>
						<th width="130">加入时间</th>
						<th width="70">状态</th>
						<th width="100">操作</th>
					</tr>
				</thead>
			    <tbody>
          <p id="no"></p>
       <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
					<tr class="text-c">
						   
						<td>

						<!-- <input type="checkbox" value="<?php echo $list['id']; ?>" name="all">
 -->
						<input  type='checkbox' value='<?php echo $list['id']; ?>'
						 name="id" class="ids"></td>
						<td><?php echo $list['id']; ?></td>
						<td><?php echo $list['title']; ?></td>
						<td><img src="temp/banner1.jpg" height=90% width=90% /></td>
						<td><?php echo date("Y-m-d H:i:s",$list['pubtime']); ?></td>
						<td class="td-status"><span class="label label-danger radius">已删除</span></td>
						<td class="td-manage">
 						
 						<input type="button"   class="subbut" value="还原" data-id='<?php echo $list['id']; ?>'  style="height: 32px; width: 42px;  color: #fff; text-align: center; border-radius: 5px; font-size: 14px; padding:5px; background: #5eb95e; border:none"/>
 						

                       	<input type="button" class="shanchu" value="彻底删除"
						  data-id='<?php echo $list['id']; ?>' style="height: 32px; width: 80px; color: #fff; text-align: center; border-radius: 5px; font-size: 14px;  padding:5px; background: #dd514c; border:none" />    </td>
								</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					
				</tbody>
			</table>
      <p id="no"><?php echo $no; ?></p>
			<div class="pageNav"><?php echo $page; ?></div>  
			</div>

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
<script type="text/javascript" src="./public/lib/jquery/1.9.1/jquery.min.js"></script>
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
<!-- 批量操作 还原 -->
<script type="text/javascript">
	$('#dosubmit').click(function(){
          var idds='';
  $('.ids').each(function() {
  if($(this).is(':checked')){
  idds+=$(this).val()+',';
  }
  });
  idds=idds.substr(0,idds.length-1);
		   			 if(confirm("确定要还原吗？"))
 	  {
	$.ajax({  
    url: "<?php echo url('System/allupuprebanner'); ?>",  
    type: "post", 
    data:{
    	id:idds
    } ,
    success:function(result) {  
            alert(result.msg);
             $(":checkbox").attr("checked",false);
            window. location.replace(location);
    }, 
     error:function(result){
      alert ('连接失败');
    }
     }); 
      }
	   });
	//批量删除
		$('#pinliangshanchu').click(function(){

      var idds='';
  $('.ids').each(function() {
  if($(this).is(':checked')){
  idds+=$(this).val()+',';
  }
  });
  idds=idds.substr(0,idds.length-1);
// alert(idds);
				 if(confirm("确定要删除吗？"))
 	  {
	
	$.ajax({  
    url: "<?php echo url('System/alldeluprebanner'); ?>",  
    type: "post", 
    data:{
    	id:idds
     } ,
    success:function(result) {  
            alert(result.msg);
            $(":checkbox").attr("checked",false);
            window.location.reload();
    }, 
     error:function(result){
      alert ('连接失败');
    }
     }); 
       }
	   });
</script>
<!-- 单个操作 -->
<script type="text/javascript">
 $('.subbut').click(function(){
 	if(confirm("确定要还原吗？"))
 	  {
    var id=$(this).attr('data-id');  
   $.ajax({
   url:"<?php echo url('System/uprebanner'); ?>",
   type:"POST",
   data:{ 
    id:id
   		 },
    success:function(result){
      alert(result.msg);
      window.location.reload();
     },
     error:function(result){
      alert ('连接失败');
     }
      });
        }
       });
 $('.shanchu').click(function(){
 	 if(confirm("确定要删除吗？"))
 	{
    var id=$(this).attr('data-id');  
   $.ajax({
   url:"<?php echo url('System/delrebanner'); ?>",
   type:"POST",
   data:{ 
    id:id
    	  		 },
    success:function(result){
      alert(result.msg);
      window.location.reload();
      },
     error:function(result){
    alert ('连接失败');
   }
    });
     }
      });
</script>
<script type="text/javascript" src="./public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="./public/lib/jquery-ui/1.9.1/jquery-ui.min.js"></script>
<!--多选框-->
<script type="text/javascript" src="./public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="./public/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="./public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<<script type="text/javascript" src="./public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="./public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<!-- <script type="text/javascript" src="./public/newjs/layer.js"></script>
 -->
<script type="text/javascript">
window.onload = (function(){
    // optional set
    pageNav.pre="&lt;上一页";
    pageNav.next="下一页&gt;";
    // p,当前页码,pn,总页面
    pageNav.fn = function(p,pn){$("#pageinfo").text("当前页:"+p+" 总页: "+pn);};
    //重写分页状态,跳到第三页,总页33页
    pageNav.go(1,13);
});
$('.table-sort').dataTable({
	"lengthMenu":false,//显示数量选择 
	"bFilter": false,//过滤功能
	"bPaginate": false,//翻页信息
	"bInfo": false,//数量信息
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
	]
});
</script>
<script type="text/javascript" src="./public/newjs/jquery.min.js"></script>

<script type="text/javascript">
	/*
 **************************
 author:Keel (keel.sike@gmail.com)
 **************************

 页码显示jquery插件,只需要存在#pageNav,则会在其中显示页码.
 调用时可根据需要先重写go方法.(已去除jquery依赖)

 **************************
 示例(注意：页面中放置id为pageNav的html对象):

 //转到页码时触发的自定义方法,p为当前页码,pn为总页数
 pageNav.fn = function(p,pn){
 alert(p+","+pn);
 };
 //初始跳到第3页,共33页
 pageNav.go(3,33);

 */
var pageNav = pageNav || {};
pageNav.fn = null;
//p为当前页码,pn为总页数
pageNav.nav = function(p, pn) {
    //只有一页,直接显示1
    if (pn <= 1) {
        this.p = 1;
        this.pn = 1;
        return this.pHtml2(1);
    }
    if (pn < p) {
        p = pn;
    };
    var re = "";
    //第一页
    if (p <= 1) {
        p = 1;
    } else {
        //非第一页
        re += this.pHtml(p - 1, pn, "上一页");
        //总是显示第一页页码
        re += this.pHtml(1, pn, "1");
    }
    //校正页码
    this.p = p;
    this.pn = pn;

    //开始页码
    var start = 2;
    var end = (pn < 6) ? pn: 6;
    //是否显示前置省略号,即大于10的开始页码
    if (p >= 5) {
        re += "<span class='mor'>...</span>";
        start = p - 2;
        var e = p + 2;
        end = (pn < e) ? pn: e;
    }
    for (var i = start; i < p; i++) {
        re += this.pHtml(i, pn);
    };
    re += this.pHtml2(p);
    for (var i = p + 1; i <= end; i++) {
        re += this.pHtml(i, pn);
    };
    if (end < pn) {
        re += "<span class='mor'>...</span>";
        //显示最后一页页码,如不需要则去掉下面这一句
        re += this.pHtml(pn, pn);
    };
    if (p < pn) {
        re += this.pHtml(p + 1, pn, "下一页");
    };
    return re;
};
//显示非当前页
pageNav.pHtml = function(pageNo, pn, showPageNo) {
    showPageNo = showPageNo || pageNo;
    var H = " <a href='javascript:pageNav.go(" + pageNo + "," + pn + ");' class='pageNum'>" + showPageNo + "</a> ";
    return H;

};
//显示当前页
pageNav.pHtml2 = function(pageNo) {
    var H = " <b>" + pageNo + "</b> ";
    return H;
};
//输出页码,可根据需要重写此方法
pageNav.go = function(p, pn) {
    //$("#pageNav").html(this.nav(p,pn)); //如果使用jQuery可用此句
    document.getElementById("pageNav").innerHTML = this.nav(p, pn);
    if (this.fn != null) {
        this.fn(this.p, this.pn);
    };
};
</script>

</body>
</html>
<!--H-ui前端框架提供前端技术支持 h-ui.net @2017-01-01 -->