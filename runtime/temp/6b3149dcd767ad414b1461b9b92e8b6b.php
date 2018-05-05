<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:21:"./admintpl/login.html";i:1507520187;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="/public/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/public/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/public/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/public/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />

<title>后台登录 - DZ.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" id="wishform" action="" onsubmit="return sub()" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" name="username" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
	       <!-- <div class="row cl"> -->
        <!-- <div class="formControls col-xs-8 col-xs-offset-3"> -->
          <!-- <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;"> -->
          <!-- <img src=""> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div> -->
      <!-- </div> -->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input id="subbtn" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" />
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 临沂大智软件开发 by DZ.admin v1.1</div>
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/lib/jquery.SuperSlide/2.1.1/jquery.SuperSlide.min.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/public/lib/laypage/1.2/laypage.js"></script>

<script>
//function getCookie(c_name)
//{
//if (document.cookie.length>0)
 // {
 // c_start=document.cookie.indexOf(c_name + "=")
  //if (c_start!=-1)
  //  { 
   // c_start=c_start + c_name.length+1 
  //  c_end=document.cookie.indexOf(";",c_start)
  //  if (c_end==-1) c_end=document.cookie.length
  //  return unescape(document.cookie.substring(c_start,c_end))
  //  } 
//  }
//return ""
//}

//function setCookie(c_name,value,expiredays)
//{
//var exdate=new Date()
//exdate.setDate(exdate.getDate()+expiredays)
//document.cookie=c_name+ "=" +escape(value)+
//((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
//}

//function checkCookie()
//{
//username=getCookie('username')
//if (username!=null && username!="")
  //{alert('Welcome again '+username+'!')}
//else 
 // {
  //username=prompt('Please enter your name:',"")
  //if (username!=null && username!="")
    //{
    //setCookie('username',username,365)
    //}
 // }
//}
	$('#subbtn').click(function (){
		
		var username=$('#username').val();
		var password=$('#password').val();
		//document.cookie="userId=828";
//document.cookie="userName=hulk";
//获取cookie字符串
//var strCookie=document.cookie;
//将多cookie切割为多个名/值对
//var arrCookie=strCookie.split("; ");
//var userName;
//遍历cookie数组，处理每个cookie对
//for(var i=0;i<arrCookie.length;i++){
//var arr=arrCookie[i].split("=");
//找到名称为userId的cookie，并返回它的值
//if("userName"==arr[0]){
//userName=arr[1];
//break;
//}
//}
//alert(userName); 
		if(username==''){
			layer.tips('用户名不能为空',$('#username'));
			return false;
		}
		if(password==''){
			layer.tips('密码不能为空',$('#password'));
			return false;
		}
		   $.ajax({
                    url:"http://www.dzcms.com/admin.php/Login/do_login",
                    type:'POST',
                    data:$('#wishform').serialize(),
                    success:function (data) {
		
					if(data.msg=='fail')
					{
						   layer.msg('你输入的密码和账户名不匹配');
					}
	
						    switch (data.status){
                            case 1:
                                layer.msg(data.msg, {
                                       // offset: 't',
                                        anim: 0
                                    });
                                setInterval(function () {
                                    location.href='/';
                                },1000);

                            break;
                       
                        
                        }
                    },
                    error:function (error) {
                        
                    }
                })
	});
</script>
</body>

</html>