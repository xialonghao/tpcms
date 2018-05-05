<?php
namespace app\admin\controller;

use think\Controller;
class System extends Controller
{
   
    //项目首页
    public function welcome()
    {
        return $this->fetch('./admintpl/welcome.html');
    }
    

    //系统设置中的基础设置--------------------------------开始
     public function system_base()
    {
       $db=db('basics');
       $data=$db->select();
       if(empty($data)){
        $id=['Id'=>1];
         $data=$db->insert($id);
       }
       //print_r($data);exit;
       $this->assign('data',$data);
       return $this->fetch('./admintpl/system_base.html');
    }


    //系统设置中的基础设置
    public function add_base(){
        $data=input('post.');
       $db=db('basics');
       $info=$db->select();
       $id=$info[0]['Id'];
       //如果数据库没有字段 执行插入功能
       if(!empty($info)){
            $sql=$db->where('Id='.$id)->update($data);
             $ab=$db->getLastSql();
            if($sql){
                    $v=[
                    'ca'=>1,
                    'word'=>'修改成功'
                ]; 
            }else{
                     $v=[
                    'ca'=>0,
                    'word'=>'未修改'
                ];
            }
       }else{
            $sql=$db->insert($data);
            if($sql){
                    $v=[
                    'ca'=>2,
                    'word'=>'修改成功'
                ]; 
            }
       }
       return json($v);
        
    }
    //屏蔽设置
    public function add_pingbi(){
        $data=input('post.');
        $db=db('basics');
         $info=$db->select();
       $id=$info[0]['Id'];
        $sql=$db->where('Id='.$id)->update($data);
        if($sql){
                    $v=[
                    'ca'=>2,
                    'word'=>'执行成功'
                ]; 
            }else{
                  $v=[
                    'ca'=>1,
                    'word'=>'未做修改'
                ]; 
            }
       
       return json($v);
    }
    //安全设置
    public function add_adminuser(){
        $data=input('post.');
        $db=db('basics');
         $info=$db->select();
       $id=$info[0]['Id'];
        $sql=$db->where('Id='.$id)->update($data);
        if($sql){
                    $v=[
                    'ca'=>2,
                    'word'=>'执行成功'
                ]; 
            }else{
                  $v=[
                    'ca'=>1,
                    'word'=>'未做修改'
                ]; 
            }
       
       return json($v);
    }

    //系统设置中的基础设置--------------------------------结束
    //
    //客服列表---------------------------------------开始
   
    //客服新增  
      public function add()
    {
         
         return $this->fetch('./admintpl/add.html');
    }
    public function do_add()
    {
        $all=input('post.');
        
        $info=db('stytem')->insert($all);
        if($info)
        {
        $data=1;
        }
        else{
        $data=0;         
        }
    return json($data);
    }


//客服修改
      public function ups()
    {
         $id=input('id');    
         $db=db('stytem');
         $info=$db->where('Id='.$id)->find();
         $this->assign('info',$info);
         return $this->fetch('./admintpl/up.html');
    }
   public function do_ups()
   {
        $db=db('stytem');
       $data=input('post.');   
       $id=input('post.Id');
       $data['Id']=$id;     
        $info=$db->where('Id='.$id)->update($data);

       if($info)
        {
        $data=1;
        }
        else{
        $data=0;         
        }
    return json($data);

   } 

//客服列表,分页
    public function lists()
    {      

      $db=db('stytem');
        // $list = $db->where('static=0')->order('id desc')->paginate('6');
        
        $content = input('content')?input('content'):'';

        if(!empty($content)){       //判断是否有搜索值content 如果有返回带wherelike的数据

        $list = $db->where('status=1')->order('id desc')->whereLike('adminName',"%".$content."%")->paginate('3',false,['query' => request()->param()]);
        }
        else{
           $list = $db->where('status=1')->order('id desc')->paginate('3');
        }
        $info=$list->toArray()['data'];

        //如果查询无数据返回$no 未找到相关数据  否则为空
        if(empty($info)){
            $no='未找到相关数据';
            $this->assign('no',$no);
        }else{
            $no='';
            $this->assign('no',$no);
        }
        //数据渲染
        $this->assign('list', $info);
        //分页渲染
        $this->assign('page', $list->render());
        //搜索默认值
        $this->assign('val',$content);
        return $this->fetch('./admintpl/lists.html');

    }

// //客服删除
//   public function det()
//   {
//      $db=db('stytem');
//      $data=input('post.');
//      $id=input('id');
//      $data['status']='0';
//      $info=$db->where('Id='.$id)->update($data);
//     if($info) 
//          {

//         $data=1;
//          }
//         else{
           
//         $data=0;

//         }

//     return json($data);


//   }
// //客服删除
//客服批量删除
   public function servicedet()
   {
       $id=input('post.id');
       $db=db('stytem');
       $data['status']='0';
      $info=$db->where('Id in ('.$id.')')->update($data);
      if($info)
        {
        $data=1;
        }
        else{
        $data=0;         
        }
    return json($data);

   }

    //客服列表---------------------------------------结束



     public function system_shielding()
    {

        return $this->fetch('./admintpl/system_shielding.html');
    }


    //系统日志列表_____________________________________开始
    public function system_log(){
        $db=db('system_log');
        $list=$db->select();
        $count=$db->count();
        $this->assign('count',$count);
        $this->assign('list',$list);
        return $this->fetch('./admintpl/system_log.html');
    }
    //用户详情管理
    public function system_user_show(){
        $db=db('system_log');
        $log_id=input('id');
        $list=$db->where('Id='.$log_id)->find();
        $this->assign('list',$list);
        return $this->fetch('./admintpl/system_user_show.html');
    }
    //系统日志删除
    public function system_log_del(){
        $db=db('system_log');
        $log_id=input('value');

        $del=$db->where('Id='.$log_id)->delete();
        if($del)
        {
            $msg=[
                'case'=>1,
                'msg'=>"删除成功",
            ];
        }else{
            $msg=[
                'case'=>2,
                'msg'=>"删除失败",
            ];
        }
        return json($msg);
//        if($del){
//            $this->success('删除成功');
//        }else{
//            $this->error('删除失败');
//        }
    }
    //批量删除
    public function system_log_del_all(){
        $db=db('system_log');
        $log_id=input('value');
//        echo "$log_id";exit;
        $del=$db->where('Id in('.$log_id.')')->delete();
        if($del)
        {
            $msg=[
                'case'=>1,
                'msg'=>"删除成功",
            ];
        }else{
            $msg=[
                'case'=>2,
                'msg'=>"删除失败",
            ];
        }
        return json($msg);
    }
 //系统日志列表_____________________________________结束


     public function state()
    {
        return $this->fetch('./admintpl/state.html');
    }
//banner列表--------------------------------------------------开始
   
    //banner 列表
    public function listbanner()
    {   
        $table=db('banner');
        $list=$table->where('static=1')->order('id desc')->paginate('3');;
        $this->assign('list',$list);
        $this->assign('page',$list->render());
        return $this->fetch('./admintpl/listbanner.html');
    }
    //banner 添加
    public function add_banner()
    {
        $db = db('banner');
        return $this->fetch('./admintpl/add_banner.html');
    }
    public function do_add_banner()
    {
        
        $data = input('post.');
        $data['pubtime'] = time();
        
        $file = request()->file('photo');
        // echo "<pre>";
        // print_r($data);
        // exit;
        if($file){
              $fileinfo = $file->move(config('upload_path'));
              $data['photo'] = $fileinfo->getSavename();
        }
      

        $db = db('banner');
        $data = $db->insert($data);
        if($data){
            $msg=1;
        }else{
            $msg=1;
        }
        return json($msg);
    }
    //banner 修改
    public function up_banner()
    {
        $id = input('id');
        $db = db('banner');
        $list = $db->where('id='.$id)->find();
        $this->assign('list',$list); 
        return $this->fetch('./admintpl/up_banner.html');
    }

    public function do_up_banner()
    {
        $id = input('id');
        $list = input('post.');
        $db = db('banner');
         $file = request()->file('photo');
         if($file){
             $fileinfo = $file->move(config('upload_path'));
             $list['photo'] = $fileinfo->getSavename();
         }
        //  print_r($list);exit;
         $db = db('banner');
        $list = $db->where('id=' . $id)->update($list);

        if ($list) {
            $this->success('succ', '/listbanner');
        } else {
            $this->error('fail', '/listbanner');
        }
    }
    //banner 删除
    public function del_banner()
    {
        $id = input('id');
        $db = db('banner');
         $data['static']=0;
            $delinfo=$db->where('id in('.$id.')')->update($data);
             if($delinfo){
            $msg=1;
        }else{
            $msg=1;
        }
        return json($msg); 
    }
//banner列表-------------------------------------------------结束
//友情链接------------------------------------------------开始

    // public function blogroll_list()
    // {
    //     return $this->fetch('./admintpl/blogroll_list.html');
    // }
    // friendlink
    public function blogroll_list()
        {

            $db=db('friendlink');
            // $list = $db->where('static=0')->order('id desc')->paginate('6');

            $content = input('content')?input('content'):'';

            if(!empty($content)){       //判断是否有搜索值content 如果有返回带wherelike的数据

                $list = $db->where('pass=1')->order('id desc')->whereLike('webname',"%".$content."%")->paginate('3',false,['query' => request()->param()]);
            }else{
                $list = $db->where('pass=1')->order('id desc')->paginate('3');
            }
            $info=$list->toArray()['data'];
            $pages=db('friendlink')->where('pass=1')->count();
            //如果查询无数据返回$no 未找到相关数据  否则为空
            if(empty($info)){
                $no='未找到相关数据';
                $this->assign('no',$no);
            }else{
                $no='';
                $this->assign('no',$no);
            }
            //总条数
            $this->assign('pages',$pages);
            //数据渲染
            $this->assign('listinfo', $info);
            //分页渲染
            $this->assign('page', $list->render());
            //搜索默认值
            $this->assign('val',$content);


            return $this->fetch('./admintpl/blogroll_list.html');
        }
        //友情链接 修改
        public function blogroll_update()
        {

            $id=input('id');
            $db=db('classify');
            $info=$db->field('sitename')->select();
            $this->assign('info',$info);
            $stu=db('friendlink');
            $upinfo=$stu->where('id="'.$id.'"')->find();
            $this->assign('upinfo',$upinfo);
            return $this->fetch('./admintpl/blogroll_update.html');
        }
        //友情链接 添加
        public function blogroll_add()
        {
            $db=db('classify');
            $info=$db->field('sitename')->select();
            $this->assign('info',$info);
            return $this->fetch('./admintpl/blogroll_add.html');
        }
        //友情链接 添加处理界面
        public function do_blogroll_add()
        {
            $data=input('post.');
            $db=db('friendlink');
            $file = request()->file('photo');
            
            if($file){
                    $fileinfo = $file->move(config('upload_path'));
                    $data['photo'] = $fileinfo->getSavename();
            }
            
            $data['inttime']=time();
            // print_r($data);exit;
            $info=$db->insert($data);

            if($info)
            {
                $data=1;
             }
             else{
                 $data=0;         
             }
            return json($data);
        }
        //友情链接 修改
        public function do_update()
        {
            $id=input('Id');
            $data=input('post.');
            $db=db('friendlink');
            $file = request()->file('photo');
            $fileinfo = $file->move(config('upload_path'));
            $data['photo'] = $fileinfo->getSavename();
            $data['inttime']=time();
            $upinfos=$db->where('id="'.$id.'"')->update($data);
            if($upinfos)
            {
                $this->success('修改成功','http://www.dzcms.com/admin.php/blogroll_list.html');
            }else {
                $this->error('修改失败');
            }
        }
        //友情链接  删除
        public function blogroll_del()
        {
            $id=input('id');
            $db=db('friendlink');
            $data['pass']=0;
            $delinfo=$db->where('id in('.$id.')')->update($data);
            if($delinfo)
            {
                 $data=1;
            }else{
                 $data=1;
            }

            return json($data);
        }
//友情链接------------------------------------------------结束

    //banner回收站操作-----------------------------------------开始
    public function rebanner()
    {
        $db=db('banner');
        // $list = $db->where('static=0')->order('id desc')->paginate('6');
        
        $content = input('content')?input('content'):'';

        if(!empty($content)){       //判断是否有搜索值content 如果有返回带wherelike的数据

        $list = $db->where('static=0')->order('id desc')->whereLike('title',"%".$content."%")->paginate('3',false,['query' => request()->param()]);
        }else{
            $list = $db->where('static=0')->order('id desc')->paginate('6');
        }
        $info=$list->toArray()['data'];

        //如果查询无数据返回$no 未找到相关数据  否则为空
        if(empty($info)){
            $no='未找到相关数据';
            $this->assign('no',$no);
        }else{
            $no='';
            $this->assign('no',$no);
        }
        //数据渲染
        $this->assign('list', $info);
        //分页渲染
        $this->assign('page', $list->render());
        //搜索默认值
        $this->assign('val',$content);
        return $this->fetch('./admintpl/rebanner.html');
    }

    //banner回收站 --单个还原
      public function uprebanner() {    
        $id=input('post.id');
        $db=db('banner');
        $data['static']='1';
        $info=$db->where('id="'.$id.'"')->update($data);
          if ($info) {
           $result=[
           'msg'=>'还原成功',
            ];
         }
        else{
            $result=[
             'msg='=>'还原失败',
         ];
        }
        return json($result);       
    }
    
 //banner回收站--单个删除
      public function delrebanner()
    {    
        $id=input('post.id');
        $db=db('banner');
        $info=$db->where('id="'.$id.'"')->delete();
          if ($info) {
           $result=[
           'msg'=>'删除成功',
            ];
         }
        else{
            $result=[
             'msg='=>'删除失败',
         ];
        }


        return json($result);
        
    }
    
 //banner回收站--批量还原
    public function allupuprebanner(){
       $id=input('post.id');
     
      $db=db('banner');
      $info['static']='1';
      $info=$db->where('Id in ('.$id.')')->update($info);
   
       if ($info) {
           $result=[
           'msg'=>'还原成功',
            ];
         }
        else{
            $result=[
             'msg='=>'还原失败',
         ];
        }
        return json($result);    
    } 

    // banner回收站--批量删除
    public function alldeluprebanner(){
       $id=input('id');

      $db=db('banner');
      $info=$db->where('Id in ('.$id.')')->delete();
       if ($info) {
           $result=[
           'msg'=>'删除成功',
            ];
         }
        else{
            $result=[
             'msg='=>'删除失败',
         ];
        }

        return json($result);
    } 

    //banner回收站操作-----------------------------------------结束
    //客服回收站---------------------------------------------开始
    public function huishouzhan(){
        
        $db=db('custom');
        $list=$db->order('Id desc')->where('state=0')->paginate(3);
        //$list->$db->list;
        //print_r($list);exit;
        $this->assign('list',$list);
        $this->assign('page',$list->render());
         $this->assign('list',$list);

        return $this->fetch('./admintpl/huishouzhan.html');
    }
     //客服回收站删除一条数据
    public  function del_user(){
        $id=input('id');    
        //print_r($id);exit;
        $db=db('custom');
        $info=$db->where('Id in('.$id.')')->delete();
        //$sql=$db->getLastSql();
        //print_r($sql);exit;
        if($info)
        {
            $msg=1;
        }
        else{
            $msg=1;
        }
        return json($msg);
        
    }
     // 客服回站还原
       public function huifu()
    {
        $db=db('custom');
        $id=input('id');
        $data=input('post.state');
        $data['state']=1;
        $info=$db->where('Id in('.$id.')')->update($data);

        if($info)
        {
            $msg=1;
        }
        else{
            $msg=1;
        }
        return json($msg);
        
  }
    //
    //连接回收站-----------------------------------------开始
       //友情链接回收站
    public function rubbish_bin()
    {
        $db=db('friendlink');   
        // $list = $db->where('pass=0')->order('id desc')->paginate('3');
        // $this->assign('huilist',$list);
        // $this->assign('page',$list);

        //搜索
        
        // $list = $db->where('pass=0')->order('id desc')->paginate('6');
        
        $content = input('content')?input('content'):'';

        if(!empty($content)){       //判断是否有搜索值content 如果有返回带wherelike的数据

        $list = $db->where('pass=0')->order('Id desc')->whereLike('webname',"%".$content."%")->paginate('3',false,['query' => request()->param()]);
        }else{
            $list = $db->where('pass=0')->order('Id desc')->paginate('3');
        }
        $info=$list->toArray()['data'];

        //如果查询无数据返回$no 未找到相关数据  否则为空
        if(empty($info)){
            $no='未找到相关数据';
            $this->assign('no',$no);
        }else{
            $no='';
            $this->assign('no',$no);
        }
        //数据渲染
        $this->assign('huilist', $info);
        //分页渲染
        $this->assign('page', $list->render());
        //搜索默认值
        $this->assign('val',$content);
        return $this->fetch('./admintpl/rubbish_bin.html');
    }
    //还原link
public function huanylink()
    {    
        // alert('sdjfdsf');
      
        $id=input('post.Id');
        $db=db('friendlink');
        $data['pass']='1';
        $info=$db->where('Id="'.$id.'"')->update($data);
          if ($info) {
           $result=[
           'msg'=>'还原成功',
            ];
         }
        else{
            $result=[
             'msg='=>'还原失败',
         ];
        }
        return json($result);
        
}
    //删除回收站连接
    public function derlink()
    {    
        $id=input('post.Id');
        $db=db('friendlink');
        $info=$db->where('Id="'.$id.'"')->delete();
          if ($info) {
           $result=[
           'msg'=>'删除成功',
            ];
         }
        else{
            $result=[
             'msg='=>'删除失败',
         ];
        }
        return json($result);
        
}

    
     //批量还原连接
    public function allhuanyuanlink(){
        $db=db('friendlink');
        $log_id=input('Id');
//        echo "$log_id";exit;
        $info['pass']='1';
        $info=$db->where('Id in('.$log_id.')')->update($info);
        if($info){
            $this->success('还原成功');
        }else{
            $this->error('还原失败');
        }
    }

 // 连接回收站--批量删除
    public function alldellink(){
        $db=db('friendlink');
        $log_id=input('Id');
//        echo "$log_id";exit;
        $del=$db->where('Id in('.$log_id.')')->delete();
        if($del){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

//连接回收站----------------------------------------------------结束

    
}
