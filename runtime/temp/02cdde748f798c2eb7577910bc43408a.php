<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:23:"./admintpl/cateadd.html";i:1508377371;}*/ ?>
<!DOCTYPE HTML>
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
	<title>分类添加</title>
	<meta name="keywords" content="关键词,5个左右,单个8汉字以内">
	<meta name="description" content="网站描述，字数尽量空制在80个汉字，160个字符以内！">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 栏目添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="container ui-sortable">
	<h1>栏目添加</h1>
	<div class="panel panel-default">
		<!-- <div class="panel-header clearfix">
            <span class="f-l">左侧标题</span>
            <span class="f-r">右侧标题</span>
        </div> -->
		<div class="panel-body">
			<form action="<?php echo url('News/do_cateadd'); ?>" method="post" id="form-admin-add" enctype="multipart/form-data">
				<table class="table table-border table-bordered">
					<tbody class="skin-minimal">


					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 请选择模型：</th>
						<td>
<span class="select-box" style="width:160px">
  <select class="select" size="1" name="template">
					<option>请选择模型</option>
					<option>文章模型</option>
		      		<option>下载模型</option>
					<option>图片模型</option>
					<option>视频模型</option>
		      		</select>
</span>
						</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 上级栏目：</th>

						<td>
							<div class="formControls col-xs-3 col-sm-4">
								<select class="select" size="1" name="catid">
									<option value="0">一级分类</option>

									<option value="1">1</option>

									<option value="2">2</option>

								</select>
							</div>
						</td>
					</tr>
					<tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 栏目中文名称：</th>

						<td>
							<div class="formControls col-xs-3 col-sm-4">
								<input type="text" class="input-text" id="zhongwen" name="catetitle" required/>
								<small id="showzhjs"></small>
							</div>
						</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 栏目英文名称：</th>

						<td>
							<div class="formControls col-xs-3 col-sm-4">
								<input type="text" class="input-text" id="zhongwen" name="catetitle" required/>
								<small id="showzhjs"></small>
							</div>
						</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 栏目图片：</th>

						<td>
							<div class="formControls col-xs-3 col-sm-5">
						<span class="btn-upload form-group">
	  <input class="input-text upload-url radius" type="text" name="image" id="uploadfile-1" readonly><a class="btn btn-primary radius"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
	  <input type="file" multiple name="image" class="input-file">
	</span>
							</div>
						</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 描述：</th>

						<td>
							<div class="formControls col-xs-3 col-sm-5">
								<textarea name="abstract" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)" required></textarea>
								<small id="showzhjs"></small>
							</div>
						</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 链接地址</th>

						<td>
							<div class="formControls col-xs-3 col-sm-4">
								<input type="text" class="input-text" id="zhongwen" name="url" required/>
								<small id="showzhjs"></small>
							</div>
						</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 是否在导航显示</th>
						<td>

							<div class="formControls col-xs-8 col-sm-9 skin-minimal">
								<div class="radio-box">
									<input type="radio" class="levels" name="level" value="2" checked="checked" id="kongzhiqi" >
									<label for="kongzhiqi">是</label>
								</div>
								<div class="radio-box">
									<input type="radio" class="levels" name="level" value="3" id="caozuo" >
									<label for="caozuo">否</label>
								</div>
							</div>
						</td>
					</tr>

					<th width="100" class="text-r"><span class="c-red">*</span> 栏目首页模板</th>
					<td>

<span class="select-box" style="width:160px">
 <select class="select" size="1" name="template_index">
					<?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$co): ?>
					<option><?php echo $co; ?></option>
		      		<?php endforeach; endif; else: echo "" ;endif; ?>
		      		</select>
</span>
					</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 栏目列表页模板</th>
						<td>
<span class="select-box" style="width:160px">
   <select class="select" size="1" name="template_list">
					<?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$vo): ?>
					<option><?php echo $vo; ?></option>
		      		<?php endforeach; endif; else: echo "" ;endif; ?>
		      		</select>
</span>
						</td>
					</tr>
					<tr>
						<th width="100" class="text-r"><span class="c-red">*</span> 内容页模板</th>
						<td>
<span class="select-box" style="width:160px">
 <select class="select" size="1" name="template_list">
					<?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$ao): ?>
					<option><?php echo $ao; ?></option>
		      		<?php endforeach; endif; else: echo "" ;endif; ?>
		      		</select>
</span>
						</td>
					</tr>
					<tr>

						<th></th>
						<td>
							<div class="row cl">
								<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
									<input id="sub" class="btn btn-primary radius" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" type="submit">
								</div>
							</div>
						</td>
					</tr>
					</tbody>

				</table>
			</form>
			<br /><br />
		</div>
	</div>


</div>

<!-- 判断的js -->
<script type="text/javascript" src="/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/UEditor/ueditor.all.min.js"> </script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/public/lib/laypage/1.2/laypage.js"></script>



<script type="text/javascript">
    $(function(){
        $("#form-admin-add").validate({
            rules:{
                title:{
                    required:true,
                },
                shorttitle:{
                    required:true,
                },
                abstract:{
                    required:true,
                },
                source:{
                    required:true,
                },

            },

        });
    });
</script>
<script type="text/javascript">
    var ue = UE.getEditor('editor');

</script>
<script type="text/javascript">
    $('#sub').click(function(){
        var rulename=$('#zhongwen').val();
        var patrn= /^[\u4e00-\u9fa5]+$/;
        if (patrn.exec(rulename))
        {

        }else{
            layer.msg('请输入中文名称',patrn.msg, {icon: 4 });
            return false;

        }
        $.ajax({
            url:"<?php echo url('News/checkzhname'); ?>",
            type:"post",
            data:{name:rulename},
            success:function (data) {
                $('#showzhjs').html(data.msg);
                if (data.status) {
                    $('#showzhjs').css('color', 'red');
                    $('#sub').attr('disabled',true);
                }
                else {
                    $('#showzhjs').css('color', 'green');
                    $('#sub').attr('disabled',false);
                }
            }
        });

    });
</script>
</body>
</html>
<!--H-ui前端框架提供前端技术支持 h-ui.net @2017-01-01 -->