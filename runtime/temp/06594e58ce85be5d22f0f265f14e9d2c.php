<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./admintpl/admin_role_list.html";i:1506581110;}*/ ?>
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
<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">

	<div class="text-c" style="height: 24px;">
		<form action="/admin-role.html" method="post" style="float: right;">
			<input type="text" class="input-text" style="width:250px" placeholder="输入角色名称" name="content" value="<?php if(!(empty($val) || (($val instanceof \think\Collection || $val instanceof \think\Paginator ) && $val->isEmpty()))): ?><?php echo $val; endif; ?>">
			<button type="submit" class="btn btn-success" name=""><i class="Hui-iconfont">&#xe665;</i> 搜角色</button>
		</form>
	</div>

	<div class="cl pd-5 bg-1 bk-gray  mt-20">
		<span class="l"> <a href="javascript:;" onclick="admin_role_del('','many')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','admin-role-add.html','800')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span>
	</div>
	



	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">角色管理</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" id="rule_check_all" value="" name=""></th>
				<th width="40">ID</th>
				<th width="200">角色名</th>
				<th>用户列表</th>
				<th width="300">描述</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>

		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$list): ?>
			<tr class="text-c">
				<td><input type="checkbox" class="check_ids" value="<?php echo $list['Id']; ?>" name=""></td>
				<td><?php echo $list['Id']; ?></td>
				<td><?php echo $list['title']; ?></td>
				<td><?php echo $list['user']; ?></td>
				<td><?php echo $list['remark']; ?></td>
				<td class="f-14"><a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','admin-role-up?id=<?php echo $list['Id']; ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>

				 <a title="删除" href="javascript:;" onclick="admin_role_del(<?php echo $list['Id']; ?>,'one')"  style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
		

	 <?php echo $page; ?>

<!--<div id="pageNav" class="dataTables_paginate paging_simple_numbers pageNav">1</div>-->


</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="./public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript">


/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(a,num){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
        //获取选中的信息的id
        var rule_id = '';
        $('.check_ids').each(function(){
            if($(this).is(':checked')){
                rule_id += $(this).val()+',';
            }
        });
        if(num=='one'){
            rule_id = a;
        }
        if(num=='many'){
            rule_id = rule_id.substr(0,rule_id.length-1);
            if(!rule_id){
                layer.msg('请选择要删除的数据!',{icon:3,time:1000});
                return;
            }
        }
        //请求后台
        $.ajax({
            type:'POST',
            url:'role_delete',
            data:{list:rule_id},
            success: function(data){
                layer.msg('已删除!',{icon:1,time:1000},function () {
                    history.go(0);
                });
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
	});
}
</script>


<!--<script type="text/javascript">-->
<!--window.onload = (function(){-->
    <!--// optional set-->
    <!--pageNav.pre="&lt;上一页";-->
    <!--pageNav.next="下一页&gt;";-->
    <!--// p,当前页码,pn,总页面-->
    <!--pageNav.fn = function(p,pn){$("#pageinfo").text("当前页:"+p+" 总页: "+pn);};-->
    <!--//重写分页状态,跳到第三页,总页33页-->
    <!--pageNav.go(1,<?php echo $page; ?>);-->
<!--});-->
<!--$('.table-sort').dataTable({-->
	<!--"lengthMenu":false,//显示数量选择 -->
	<!--"bFilter": false,//过滤功能-->
	<!--"bPaginate": false,//翻页信息-->
	<!--"bInfo": false,//数量信息-->
	<!--"aaSorting": [[ 1, "desc" ]],//默认第几个排序-->
	<!--"bStateSave": true,//状态保存-->
	<!--"aoColumnDefs": [-->
	  <!--//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示-->
	  <!--{"orderable":false,"aTargets":[0,8]}// 制定列不参与排序-->
	<!--]-->
<!--});-->
<!--</script>-->



<!--<script>-->

<!--var pageNav = pageNav || {};-->
<!--pageNav.fn = null;-->
<!--//p为当前页码,pn为总页数-->
<!--pageNav.nav = function(p, pn) {-->
    <!--//只有一页,直接显示1-->
    <!--if (pn <= 1) {-->
        <!--this.p = 1;-->
        <!--this.pn = 1;-->
        <!--return this.pHtml2(1);-->
    <!--}-->
    <!--if (pn < p) {-->
        <!--p = pn;-->
    <!--};-->
    <!--var re = "";-->
    <!--//第一页-->
    <!--if (p < 1) {         //修改过p<=1-->
        <!--p = 1;-->
    <!--} else {-->
        <!--//非第一页-->
        <!--re += this.pHtml(p - 0, pn, "&lt;上一页");-->
        <!--//总是显示第一页页码-->
        <!--re += this.pHtml(1, pn, "1");-->
    <!--}-->
    <!--//校正页码-->
    <!--this.p = p;-->
    <!--this.pn = pn;-->

    <!--//开始页码-->
    <!--var start = 2;-->
    <!--var end = (pn < 6) ? pn: 6;-->
    <!--//是否显示前置省略号,即大于10的开始页码-->
    <!--if (p >= 5) {-->
        <!--re += "<span class='mor'>...</span>";-->
        <!--start = p - 2;-->
        <!--var e = p + 2;-->
        <!--end = (pn < e) ? pn: e;-->
    <!--}-->
    <!--for (var i = start; i < p; i++) {-->
        <!--re += this.pHtml(i, pn);-->
    <!--};-->
    <!--re += this.pHtml2(p);-->
    <!--for (var i = p + 1; i <= end; i++) {-->
        <!--re += this.pHtml(i, pn);-->
    <!--};-->
    <!--if (end < pn) {-->
        <!--re += "<span class='mor'>...</span>";-->
        <!--//显示最后一页页码,如不需要则去掉下面这一句-->
        <!--re += this.pHtml(pn, pn);-->
    <!--};-->
    <!--if (p < pn) {-->
        <!--re += this.pHtml(p + 1, pn, "下一页&gt;");-->
    <!--};-->
    <!--return re;-->
<!--};-->
<!--//显示非当前页-->
<!--pageNav.pHtml = function(pageNo, pn, showPageNo) {-->
    <!--showPageNo = showPageNo || pageNo;-->
    <!--if(showPageNo==1){-->
    	<!--return   '';-->
    <!--}-->
    <!--var H = " <a href='?page=" + pageNo + "' class='pageNum'>" + showPageNo + "</a> ";//修改过-->
    <!--return H;-->

<!--};-->
<!--//显示当前页-->
<!--pageNav.pHtml2 = function(pageNo) {-->
    <!--var H = " <b>" + pageNo + "</b> ";-->
    <!--return H;-->
<!--};-->
<!--//输出页码,可根据需要重写此方法-->
<!--pageNav.go = function(p, pn) {-->
    <!--//$("#pageNav").html(this.nav(p,pn)); //如果使用jQuery可用此句-->
    <!--document.getElementById("pageNav").innerHTML = this.nav(p, pn);-->
    <!--if (this.fn != null) {-->
        <!--this.fn(this.p, this.pn);-->
    <!--};-->
<!--};-->
<!--</script>-->

</body>
</html>