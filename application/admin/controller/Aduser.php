<?php
namespace app\admin\controller;

use think\Controller;
header("Content-type:text/html;charset=utf-8");
session_start();
class Aduser extends Controller
{
	/*欢迎页*/
	    public function welcome(){
			$table2=db('auth_group');
		$info=db('admin')->where('id='.session('id'))->find();
		$info['all']=db('news')->count();
		for($i=0;$i<count($info);$i++){				
				$info['title']=$table2->field('title')->where('id='.$info['group'])->find()['title'];
			}
		$this->assign('vo',$info);
		
        return $this->fetch('./admintpl/welcome.html');
    }
	/*默认首页*/
	   public function index(){
		$table2=db('auth_group');
		$info=db('admin')->where('id='.session('id'))->find();
		for($i=0;$i<count($info);$i++){				
				$info['title']=$table2->field('title')->where('id='.$info['group'])->find()['title'];
			}
		$this->assign('vo',$info);
        return $this->fetch('./admintpl/index.html');
    }
		public function myinfo(){
			$id=input('id');
			$table2=db('auth_group');
			$info=db('admin')->where('id='.$id)->find();
				for($i=0;$i<count($info);$i++){				
				$info['title']=$table2->field('title')->where('id='.$info['group'])->find()['title'];
			}
			if($info){
				$data=[
				'username'=>$info['username'],
				'sex'=>$info['sex'],
				'email'=>$info['email'],
				'telphone'=>$info['telphone'],
				'remark'=>$info['remark'],
				'title'=>$info['title'],
				'status'=>1,
				];
				
			}else{
				$data=
				[
				'status'=>1,
				'msg'=>'未查到您的信息'
				];
			}
			return json($data);
		}
	/*退出*/
	public function quit(){
		
		$info=session_destroy();
		if($info){
			$data['status']=1;
		}else{
			$data['status']=2;
		}
		return json($data);
    }
    /* 权限管理列表 */
    public function aduserrule()
    {
        $group = db('auth_rule');
        $content = input('content')?input('content'):'';
        if(!empty($content)){       //判断是否有分页 如果有返回带where的数据

            $list = $group->order('id desc')->whereLike('name',"%".$content."%")->paginate('10',false,['query' => request()->param()]);
            $num = $group->order('id desc')->whereLike('name',"%".$content."%")->count();

        }else{
            $list = $group->order('id desc')->paginate('10');
            $num = $group->count();
        }

        $info=$list->toArray()['data'];
        $this->assign('num',$num);
        $this->assign('page',$list->render());
        $this->assign('list',$info);
        $this->assign('val',$content);
        return $this->fetch('./admintpl/admin_rule_list.html');
    }


    /* 权限添加 */
    public function ruleadd(){
        $db=db('auth_rule');
        $rulelist = $db->where('parentid=0')->select(); //查找第一级的权限 先在页面显示
        $this->assign('rulelist', $rulelist);
        return $this->fetch('./admintpl/admin_rule_add.html');
    }


    /* 权限添加处理 */
    public function do_addrule(){
        $db=db('auth_rule');
        $data=input('post.');
        $list = $db->insert($data);
        if ($list) {
            return json('succ');
        } else {
            return json('fail');
        }
    }


    /* 权限上一级 */
    public function rule_parent(){
        $db=db('auth_rule');
        $id=input('post.id');
        if($id==1){     //如果是1 查找上一级
            $list = $db->where('level=0')->select();
        }
        if($id==2){     //如果是2 查找上一级
            $list = $db->where('level=1')->select();
        }
        if ($id==3){    //如果是3 查找上一级
            $list = $db->where('level=2')->select();
        }
        return json($list);
    }



    /* 修改权限状态（启用、禁用） */
    public function permission_status(){
        $admin = db('auth_rule');
        $list = input('');
        $info = $admin->update($list);
        if($info){
            $data = $list['Id'];
            return json($data);
        }else{
            $data = 0;
            return json($data);
        }
    }

    /* 删除（批量删除） 权限 */
    public function aduser_permission_delete(){
        $db=db('auth_rule');
        $id=input('list');
        $info=$db->where('Id in ('.$id.')')->delete();
        if($info){
            $data = '1';
            return json($data);
        }else{
            $data = '0';
            return json($data);
        }
    }


    /* 权限修改页面 */
    public function ruleupdate(){
        $table=db('auth_rule');
        $usid=input('id');
        $usinfo=$table->where('Id='.$usid)->find();
        $rulelist = $table->where('level='.($usinfo['level']-1))->select(); //查找出权限上一级列表 在前台显示 选择
        $this->assign('infos',$usinfo);
        $this->assign('rulelist', $rulelist);
        return $this->fetch('admintpl/admin_rule_update.html');
    }



    /* 权限名字合法性验证 */
    public function ruleverify(){
        $name=input('name');
        $id=input('id');            //如果有id存在就是从修改页面过来的
        $db = db('auth_rule');
        $nametype=input('post.nametype');       //英文名字或者中文名字

        if($nametype=='cn'){
            if(isset($id)&&!empty($id)){
                $info = $db->where("name='".$name."'&&Id!=".$id)->find();   //如果存在id 保证当前的姓名可以显示使用 查询忽略掉当前id这一条
            }else{
                $info = $db->where("name='".$name."'")->find();
            }
        }elseif ($nametype=='en'){
            if(isset($id)&&!empty($id)){
                $info = $db->where("title='".$name."'&&Id!=".$id)->find();  //如果存在id 保证当前的姓名可以显示使用 查询忽略掉当前id这一条
            }else{
                $info = $db->where("title='".$name."'")->find();
            }
        }
        if($info){  // if $info 姓名存在   else 不存在
            return json(true);
        }else{
            return json(false);
        }
    }

    /* 权限修改处理页面 */
    public function do_updats(){
        $table=db('auth_rule');
        $userid=input('post.Id');
        $data=input('post.');
        $info = $table->where('Id='.$userid)->update($data);

        if($info)       //判断成功、失败、未修改三种状态
        {
           return json('succ');
        }
        elseif($info!==false)
        {
            return json('notupdate');
        }
        elseif ($info===false){
            return json('fail');
        }
    }


    /* 角色管理列表 */
    public function aduserrole(){
        $content = input('content')?input('content'):'';    //有content代表有搜索
        if(!empty($content)){   //有搜索带whereLike

            $lists = db('auth_group')->order('id asc')->whereLike('title',"%".$content."%")->paginate('10',false,['query' => request()->param()]);
            $list=$lists->toArray();

        }else{

            $lists=db('auth_group')->order('id desc')->paginate(10);
            $list=$lists->toArray();

        }


        for($i=0;$i<count($list['data']);$i++){     //前台角色用户列表 需要连表查询
            $list['data'][$i]['user']='';   //追加数组

            $allgroupid=db('auth_group_access')->where('group_id='.$list['data'][$i]['Id'])->select();     //查找所有用户和对应的角色

            foreach ($allgroupid as $k){    //查找刚刚查询出来的uid所对应的姓名 使用字符串拼接的形式赋值给刚创建的变量
                $list['data'][$i]['user'].=db('admin')->where('Id='.$k['uid'])->find()['username'].'、';
            }
            if($list['data'][$i]['user']!=''){      //去掉最后的拼接符号
                $list['data'][$i]['user']=substr($list['data'][$i]['user'],0,strlen($list['data'][$i]['user'])-3);
            }
        }

        $num=count($list['data']);
        $this->assign('page',$lists->render());  //渲染分页
        $this->assign('list',$list['data']);     //列表
        $this->assign('val',$content);           //查找内容
        $this->assign('num',$num);               //总数据
        return $this->fetch('./admintpl/admin_role_list.html');
    }




    /* 角色添加 */
    public function roleadd(){
        $db=db('auth_rule');
        $rule_list=$db->where('parentid=0')->select(); //模块

        foreach($rule_list as &$v) {
            $v['second']=$db->where('parentid='.$v['Id'])->select();    //控制器
            foreach($v['second'] as &$t) {
                $t['third']=$db->where('parentid='.$t['Id'])->select();  //方法
            }
        }
        $this->assign('rulelist',$rule_list);
        return $this->fetch('./admintpl/admin_role_add.html');
    }

    /* 角色添加处理 */
    public function do_roleadd()
    {
        $data=input('post.');
        $db=db('auth_group');
        $info=$db->insert($data);
        if($info)
        {
            return json('succ');
        }else{
            return json('fail');
        }

    }

    /* 权限名字合法性验证 */
    public function roleverify(){
        $name=input('name');
        $id=input('id');            //如果有id存在就是从修改页面过来的
        $db = db('auth_group');
        if(isset($id)&&!empty($id)){
            $info = $db->where("title='".$name."'&&Id!=".$id)->find();  //如果存在id 保证当前的姓名可以显示使用 查询忽略掉当前id这一条
        }else{
            $info = $db->where("title='".$name."'")->find();
        }

        if($info){
            return json(true);
        }else{
            return json(false);
        }
    }



    /* 角色修改 */
    public function roleupdate()
    {
        $id=input('get.id');
        $db=db('auth_group');
        $ruletable=db('auth_rule');
        $rule_list=$ruletable->where('parentid=0')->select();   //模块
        foreach($rule_list as &$v) {
            $v['second']=$ruletable->where('parentid='.$v['Id'])->select(); //控制器
            foreach($v['second'] as &$t) {
                $t['third']=$ruletable->where('parentid='.$t['Id'])->select();  //方法
            }
        }
        $info=$db->where('Id='.$id)->find();
        $this->assign("info",$info);
        $this->assign('rulelist',$rule_list);
        return $this->fetch('./admintpl/admin_role_update.html');
    }


    /* 角色修改处理 */
    public function do_aduser()
    {
        $data=input('post.');
        $id=$data['Id'];
        unset($data['Id']);
        $db=db('auth_group');
        $info=$db->where('Id='.$id)->update($data);

        if($info)        //判断成功、失败、未修改三种状态
        {
            return json('succ');
        }
        elseif($info!==false)
        {
            return json('notupdate');
        }
        elseif ($info===false){
            return json('fail');
        }
    }


    /* 删除（批量删除） 角色 */
    public function role_delete(){
        $db=db('auth_group');
        $id=input('list');
        $info=$db->where('Id in ('.$id.')')->delete();
        //删除成功返回1 失败则返回0
        if($info){
            $data = '1';
            return json($data);
        }else{
            $data = '0';
            return json($data);
        }
    }




    /* 管理员列表 */
    public function aduserlist(){
        $admin = db('admin');
        $group = db('auth_group');
        $content = input('content')?input('content'):'';    //有content代表有搜索
        if(!empty($content)){   //带whereLike查询

            $list = $admin->order('id asc')->where('trash='.'1')->whereLike('username',"%".$content."%")->paginate('10',false,['query' => request()->param()]);
            $info = $admin->order('id asc')->where('trash='.'1')->whereLike('username',"%".$content."%")->select();
            $num = count($info);

        }else{      //正常查询

            $list = $admin->order('id asc')->where('trash='.'1')->paginate('10');
            $info = $admin->order("Id asc")->where('trash='.'1')->select();
            $num = count($info);

        }
        $this->assign('page',$list->render());
        $info=$list->toArray()['data'];

        //查询角色表 得到每个管理员的角色
        for($i=0;$i<count($info);$i++){
            $info[$i]['role']=$group->where('Id='.$info[$i]['group'])->find()['title'];
        }
        $this->assign('val',$content);
        $this->assign('num',$num);
        $this->assign('list',$info);
        return $this->fetch('./admintpl/admin_list.html');
    }



    /* 修改管理员的状态 */
    public function aduser_change_status(){
        $admin = db('admin');
        $list = input();
        $info = $admin->update($list);
        //修改成功返回1 失败则返回0
        if($info){
            $data = $list['id'];
            return json($data);
        }else{
            $data = 0;
            return json($data);
        }
    }


    /* 删除（批量删除） 管理员 */
    public function aduser_delete(){
        $db=db('admin');
        $id=input('list');
        $info=$db->where('Id in ('.$id.')')->delete();
        //删除成功返回1 失败则返回0
        if($info){
            $data = '1';
            return json($data);
        }else{
            $data = '0';
            return json($data);
        }
    }

    /* 管理员添加页面 */
    public function aduseradd(){
        $db=db('auth_group');
        $info=$db->field('Id,title')->where('status=1')->select();   //查找用户组名称
        $this->assign('groupname',$info);
        return $this->fetch('./admintpl/admin_add.html');
    }


    /* 添加管理员处理 */
    public function do_aduseradd(){
        $data=input('post.');
        $data['username']=$data['adminName'];
        $data['password']=md5($data['password']);
        $data['telphone']=$data['phone'];
        $data['group']=$data['adminRole'];
        $data['inputtime']=time();
        unset($data['adminName']);
        unset($data['phone']);
        unset($data['adminRole']);
        //return print_r($data);
        $file=request()->file("upload_photo");
        if($file){                                      //上传头像
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $data['photo']="/public/Uploads/".$info->getSaveName();    //获取图片路径
            }
        }
        $db=db('admin');
        $ins=$db->insert($data);

        if($ins){
            /*管理员插入成功向用户规则表插入数据*/
            $grdb=db('auth_group_access');
            $grdata=[
                'uid'=>$db->getLastInsID(),
                'group_id'=>$data['group'],
            ];
            $grins=$grdb->insert($grdata);
            /*向用户规则表插入数据结束*/

            if($grins){             //插入成功返回succ 否则删除刚才插入的管理员 返回fail
                return json('succ');

            }else{
                $db->where('id='.$db->getLastInsID())->delete();
                return json('fail');

            }
        }else{
            return json('fail');

        }
    }


    /* 管理员姓名验证 */
    public function adverify(){
        $name=input('adminName');
        $id=input('id');            //如果有id存在就是从修改页面过来的
        $db = db('admin');
        if(isset($id)&&!empty($id)){
            $info = $db->where("username='".$name."'&&id!=".$id)->find();
        }else{
            $info = $db->where("username='".$name."'")->find();
        }
        if($info){
            return json(true);
        }else{
            return json(false);
        }
    }


    /* 管理员修改页面 */
    public function aduserupdate(){

        //查找用户
        $db=db('admin');
        $adminId=input('get.aid');
        $info2=$db->where('Id='.$adminId)->find();
        $this->assign('ainfo',$info2);
        //查找用户结束


        //查找用户组名称
        $group=db('auth_group');
        $info=$group->field('Id,title')->where('status=1')->select();
        $this->assign('groupname',$info);
        //查找用户组名称结束

        return $this->fetch('./admintpl/admin_update.html');
    }




    /* 修改管理员处理 */
    public function do_aduserupdate(){
        $data=input('post.');
        $id=$data['userid'];
        $data['username']=$data['adminName'];
        $data['password']=md5($data['password']);
        $data['telphone']=$data['phone'];
        $data['group']=$data['adminRole'];
        unset($data['adminName']);
        unset($data['phone']);
        unset($data['adminRole']);
        unset($data['userid']);
        if($data['password']==''){
            unset($data['password']);
        }
        $file=request()->file("upload_photo");
        if($file){                                      //上传头像
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $data['photo']="/public/Uploads/".$info->getSaveName();    //获取图片路径
            }
        }
        $db=db('admin');
        $ins=$db->where('id='.$id)->update($data);

        if($ins){

            /*管理员修改成功向用户规则表修改数据*/
            $grdb=db('auth_group_access');
            $grdata=[
                'group_id'=>$data['group'],
            ];
            $grins=$grdb->where('uid='.$id)->update($grdata);
            /*用户规则表修改数据结束*/

            if($grins!==false){
                return json('succ');
            }else{
                return json('fail');
            }
        }elseif ($ins!==false){
            return json('notupdate');
        }else{
            return json('fail');
        }
    }
		
		 public function database_backups()
    {
        $tablelist=db()->query('show tables');
		$tablearr=[];
        foreach($tablelist as $v)
        {
            $tableinfo=db()->query("show table status like '".$v['Tables_in_lianxiyi']."'");
          foreach($tableinfo as $t)
           {
                $totalsize=$t['Data_length']+$t['Index_length'];
                $size=$totalsize/1024;   //kb 
				
				if($size>=1048576){
					$totalsize1=$size/1024;   // m  
					$totalsize=sprintf("%.2f", $totalsize1).'GB'; 
				}elseif($size>=1024){
					$totalsize1=$size/1024;
					$totalsize=sprintf("%.2f", $totalsize1).'MB';
				}
				else{
					$totalsize= sprintf("%.2f", $size).'KB';
				}
           }
            
            $tableinfo[0]['totalsize']=$totalsize;
           $tablearr[]=$tableinfo[0];
		}
		// echo "<pre>";
       // print_r($tablearr);
      
       $this->assign('tablearr',$tablearr);
        return $this->fetch('./admintpl/database_backups.html');

    }
	public function database_restore(){
		return $this->fetch('./admintpl/database_restore.html');;
	}
    public function yijianback()
    {
        echo "<pre>";
        $tablelist=db()->query('show tables');
		print_r($tablelist);
        $sql='';
        foreach($tablelist as $v)
        {
            $info=db()->query("show create table ".$v['Tables_in_lianxiyi']);
            $sql.=$info[0]['Create Table'].";\r\n";
			print_r($sql);
        }
        $dir=ROOT_PATH."/sqldata/";
        is_dir($dir)||mkdir($dir,0777);
        $files=$dir.'2017-09-26.sql';
        file_put_contents($files,$sql);
        //return $sql;
    }	
		public function optimize()
	{
		//echo "<pre>";
		$lists=db()->query('show tables');
		$name=input('id');
		$id=input('ids');
		switch($id){
			case 1:	$info=db()->query("OPTIMIZE table ".$name);
			  break;
			case 2: $info=db()->query("repair table ".$name);
			  break;
			case 3: $list=db()->query("show create table ".$name);
			  return json($list[0]['Create Table']);
			  break;
			
		}
			 if($info)
		 {
			 $data['msg']='succ';
		 }else{
			 $data['msg']='fail';
		 }

		return json($data);
		
	}
	//选择页面
    public function do_templet()
    {


        $drr = ROOT_PATH . "templates";
        $timls=[];
        $fle = scandir($drr);
        //文件名
        //print_r($fle);eixt;
        unset($fle[0]);
        unset($fle[1]);
        foreach( $fle as $v){
           //显示文件名称信息
            $b=pathinfo($v);
            if(!isset($b['extension'])){
                $timls[]=$b['basename'];

            }
           // echo"<pre>";
           // print_r($b);eixt;
        }
        $this->assign('xueze',$timls);
//        $this->assign('feige',$fle);
        // $this->assign('timlist',$timls);
        return $this->fetch('./admintpl/templet_page.html');
    }

    public function do_acb(){
       $name = input('post.val');
       // $name='defaults';
        $drr = ROOT_PATH . "templates\\".$name;
        $file = scandir($drr);
        $a=[];
        unset($file[0]);
        unset($file[1]);
        foreach($file as $v){
            $f=pathinfo($v);
            if(isset($f['extension']) && ($f['extension'])=="html"){

                if(strpos($f['basename'],'category')!==false){
                    $a['category'][]=$f['basename'];
                }
                if(strpos($f['basename'],'list')!==false){
                    $a['list'][]=$f['basename'];
                }
                if(strpos($f['basename'],'show')!==false){
                    $a['show'][]=$f['basename'];
                }
            }

        }
       // echo "<pre>";
        //print_r($f);exit;

        return json($a);
    }
    public function add_style(){
        $styles['styles']=input('post.styles');
        $result=db('basics')->where('id=1')->update($styles);
        if($result){
            echo 'succ';
        }else{
            echo "fail";
        }
    }


}