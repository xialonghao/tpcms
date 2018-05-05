<?php

namespace app\admin\controller;

use think\Controller;

class News extends Controller{
    public function newslist()    //资讯列表
    {  
    	$list=db('news')->alias('a')->field('a.id,a.title,a.source,a.inputtime,a.looknum,a.status,cate.catetitle')->join('cate','cate.id=a.cateid')
    	->where('a.isdel',0)->select();
		$list['all']=db('news')->count();
      	$this->assign("list", $list);
       return $this->fetch('./admintpl/newslist.html');
    }
    public function newsadd()    //资讯添加
    {  
    	$db=db('cate');  //查询分类表
    	$catelist=$db->select();
    	$this->assign('catelist',$catelist);
       return $this->fetch('./admintpl/newsadd.html');
    }
    public function do_newsadd()    //资讯添加判断
    {  

    	// echo "<pre>";
     //   $data=input('post.');
     //  	print_r($data);
       $data=input('post.');//接受
       $db=db('news');//连库
       $data['inputtime']=time();
		$file = request()->file('smallimage');
        if($file){
            $fileinfo = $file->move(config('upload_path'));
           	$data['smallimage'] = $fileinfo->getSavename();
            }
       $list=$db->insert($data);//接受传来的数据，并插入数据库
       if($list){
         $this->success('succ','News/newslist');
       }
       else{
          $this->error('error','New/newslist');
       }
    }
     public function statu()  //资讯的审核
    {
    	$id = input('id');
    	$db = db('news');
    	$data['status']=1;
    	$info = $db->where('id in('.$id.')')->update($data);
    	if($info)
            {
                $result=[
                    'msg'=>'审核成功',
                    'status'=>1,
                ];
            }
            else{
                $result=[
                    'msg'=>'审核失败',
                    'status'=>2
                ];
            }
        
        return json($result);
    }
    //////取消审核
    public function cancel()  
    {
    	$id = input('id');
    	$db = db('news');
    	$data['status']=0;
    	$info = $db->where('id in('.$id.')')->update($data);
    	if($info)
            {
                $result=[
                    'msg'=>'取消成功',
                    'status'=>1
                ];
            }
            else{
                $result=[
                    'msg'=>'取消失败',
                    'status'=>2
                ];
            }
        
        return json($result);
    }
      public function newsdel()  //资讯的删除
    {
    	$id = input('id');
    	$db = db('news');
    	$data['isdel']=1;
    	$info = $db->where('id in('.$id.')')->update($data);
    	if($info)
            {
                $result=[
                    'msg'=>'删除成功',
                    'status'=>1
                ];
            }
            else{
                $result=[
                    'msg'=>'删除失败',
                    'status'=>2
                ];
            }
        
        return json($result);
    }
    public function newsup()    //资讯修改
    {  
       $id=input('id');
       $db=db('news');
       $list=$db->where('id='.$id)->find();
       $this->assign('list',$list);
     //   $list=db('cate')->alias('a')->join('news','news.cateid=a.id')
    	// ->where('news.id='.$id)->find();
    	// echo "<pre>";
    	// print_r($list);exit;

       return $this->fetch('./admintpl/newsup.html');
    }
    public function do_newsup()   //资讯修改判断
    {
      $id=input('id');
      //print_r($id);
       $db=db('news');
       $data=input('post.');
       // unset($data['Id']);
       // exit;
       $file = request()->file('smallimage');    
            if($file){
            $fileinfo = $file->move(config('upload_path'));
            $data['smallimage'] = $fileinfo->getSavename();
        }
		unset($data['id']);
       $info = $db->where('id='.$id)->update($data);
  
       if($info){
          $this->success('succ','News/newslist');
       }
       else{
          $this->error('error','News/newslist');
       }
    }

    public function newsrecover()    //资讯回收站
    {  
    	$db=db('news');
    	$list=$db->where('isdel=1')->select();
		$list['all']=db('news')->count('isdel=1');
    	$this->assign('list',$list);
		
       return $this->fetch('./admintpl/newsrecover.html');
    }
    public function newsrecoverdel()   //回收站的删除
    {
        $id = input('id');
    	$db = db('news');
    	$info = $db->where('id in('.$id.')')->delete();
    	if($info)
            {
                $result=[
                    'msg'=>'删除成功',
                    'status'=>1
                ];
            }
            else{
                $result=[
                    'msg'=>'删除失败',
                    'status'=>2
                ];
            }
        
        return json($result);
    }
    public function newsrestore()  //回收站还原
    {
    	$id = input('id');
    	$db = db('news');
    	$data['isdel']=0;
    	$info = $db->where('id in('.$id.')')->update($data);
    	if($info)
            {
                $result=[
                    'msg'=>'还原成功',
                    'status'=>1
                ];
            }
            else{
                $result=[
                    'msg'=>'还原失败',
                    'status'=>2
                ];
            }
        
        return json($result);
    }

     public function newspage()    //评论列表
    {  
    	$id=input('id');
    	$list=db('comment')->where('newsid='.$id)->select();
    	// echo "<pre>";
    	// print_r($list);
    	// exit;
        $this->assign('user',$list);
       return $this->fetch('./admintpl/newspage.html');
    }
     public function comdel()    //删除评论
    {
        $id=input('id');
        $db=db('comment');
        $info=$db->where('id='.$id)->delete();
        if($info)
            {
                $result=[
                    'msg'=>'删除成功',
                    'status'=>1
                ];
            }
            else{
                $result=[
                    'msg'=>'删除失败',
                    'status'=>2
                ];
            }
        
        return json($result);
	}
    public function catelist()    //资讯分类列表
    {  
       $list=db('cate')->where('isdel=0')->select();
	   $list['all']=db('cate')->count();
       $this->assign("catelist", $list);
       return $this->fetch('./admintpl/catelist.html');
    }
     public function cateadd()    //资讯分类添加
    {  
       return $this->fetch('./admintpl/cateadd.html');
   }
     public function do_cateadd()    //资讯分类添加
    {

        //'post.'获取form表单input里的name所有值的；
        $date=input('post.');
//        echo"<pre>";
//        print_r($date);exit;
        //request()获取,上传file图片值的服去到数组中
        $file=request()->file('image');
        //move()实现图片上传的,upload_path创建文件夹放图片的;
        $fileinfo=$file->move(config('upload_path'));
        //getSavenmae()获取最终路径和名称的;
        $date['image']=$fileinfo->getSavename();

        ;
        $info=db('category')->insert($date);
        if($info)
        {
            $this->success('添加成功');
        }
        else
        {
            $this->success('添加失败');
        }

    }
    public function checkzhname()
    {
        $name=input('post.name');
        $db=db('cate');
        $info=$db->where("title='".$name."'")->find();
        if($info)
        {
            $adata=[
                'status'=>1,
                'msg'=>'此中文名称已存在'
            ];
        }
        else{
            $adata=[
                'status'=>0,
                'msg'=>'此中文名称可用'
            ];
        }
        return json($adata);
    }
        public function catedel()  //资讯分类的删除
    {
        $id = input('id');
    	$db = db('cate');
    	$db2=db('news');
    	$info=$db2->where("cateid='".$id."'")->find();
    	///$list=db('cate')->join('news','news.cateid='.$id)->find();
    	if($info)
    	{
    		$result=[
                    'msg'=>'该分类内容还存在',
                    'status'=>3
                ];
    	}else{
    		$data['isdel']=1;
    		$info = $db->where('id in('.$id.')')->update($data);
    	if($info)
            {
                $result=[
                    'msg'=>'删除成功',
                    'status'=>1
                ];    
            }
            else{
                $result=[
                    'msg'=>'删除失败',
                    'status'=>2
                ];
            }
    	}
        return json($result);
    }
      public function cateup()    //资讯分类修改
    {  

        $id=input('id');
       $table=db('cate');
       $info=$table->where('id='.$id)->find();
       $this->assign('info',$info);
       return $this->fetch('./admintpl/cateup.html');
    }


     public function do_cateup()    //资讯分类修改判断
    {  
     
      $data=input('post.');
      
       $table=db('cate');
      $info=$table->update($data);
      if($info!==false)
        {
          $this->success('修改成功','News/catelist');
           }else{
         
         $this->error('修改失败');
         }
       
    }
     public function caterecover()    //资讯分类回收站
    {  
    	$db=db('cate');
    	$list=$db->where('isdel=1')->select();
    	$this->assign('list',$list);
       return $this->fetch('./admintpl/caterecover.html');
    }
    public function recoverdel()    //资讯分类回收站的删除
    {
      	$id = input('id');
    	$db = db('cate');
    	$db2=db('news');
    	$info=$db2->where("cateid='".$id."'")->find();
    	///$list=db('cate')->join('news','news.cateid='.$id)->find();
    	if($info)
    	{
    		$result=[
                    'msg'=>'该分类内容还存在',
                    'status'=>3
                ];
    	}else{
    		$info = $db->where('id in('.$id.')')->delete();
    	if($info)
            {
                $result=[
                    'msg'=>'删除成功',
                    'status'=>1
                ];    
            }
            else{
                $result=[
                    'msg'=>'删除失败',
                    'status'=>2
                ];
            }
    	}
        return json($result);
    }

     public function caterestore()  //回收站还原
    {
    	$id = input('id');
    	$db = db('cate');
    	$data['isdel']=0;
    	$info = $db->where('id in('.$id.')')->update($data);
    	if($info)
            {
                $result=[
                    'msg'=>'还原成功',
                    'status'=>1
                ];
            }
            else{
                $result=[
                    'msg'=>'还原失败',
                    'status'=>2
                ];
            }
        
        return json($result);
    }
    public function cateadds()    //资讯分类添加
    {
        $db=db('category');  //查询分类表
        $db1=db('basics');
        $info=$db1->where('id=1')->value('styles');
        $drr = ROOT_PATH . "templates\\".$info;
        $file = scandir($drr);
        $arr=[];
        $atr=[];
        unset($file[0]);
        unset($file[1]);
        foreach($file as $v){
            $f=pathinfo($v);
            if(isset($f['extension']) && ($f['extension'])=="html"){
                $arr[]=$f['basename'];
            }
//            echo"<pre>";
//            print_r($f);exit;
//            var_dump($f);
        }
//        $data=input('post.');
//        $info=$db->insert($data);

        $list=$db->select();
        $this->assign('list',$list);
        $this->assign('arr',$arr);
        return $this->fetch('./admintpl/cateadd.html');
    }




}