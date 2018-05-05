<?php
namespace app\admin\controller;

use think\Controller;

class Nav extends Controller
{
	public function listnav()
	{
		// $list=db('dz_nav')->page(1,4)->select();
  //       $this->assign('list',$list);
        $countpage=ceil(db('nav')->count()/2);
  //       $countpages=db('dz_nav')->count();
         $this->assign('countpage',$countpage);
           $db=db('nav');
           $list=$db->where('static=0')->select();
           $this->assign('list',$list);
		   $info=$db->paginate('4');
		   $this->assign('find',$info->toArray());
		   $page=$info->render();
		   $this->assign('pages',$page);
		return $this->fetch('./admintpl/listnav.html');
	}
	 public function getlists(){
        $page=input('page');
       
        $list=db('nav')->page($page,4)->select();
        return json($list);
        
    }
    public function do_first_del()
    {
    	$id = input('id');
    	$db = db('nav');
    	$data['static']=1;
    	$info = $db->where('Id in('.$id.')')->update($data);
    	if($info)
            {
                $result=[
                    'msg'=>'删除成功',
                    'status'=>1
                ];
                $iddd=[
                    'msg'=>'删除成功',
                    'status'=>1
                ];
            }
            else{
                $result=[
                    'msg'=>'删除失败',
                    'status'=>2
                ];
                $iddd=[
                    'msg'=>'删除失败',
                    'status'=>2
                ];
            }
        
        return json($result);
        return json($iddd);
    }
    public function do_del()
    {
    	$id = input('id');
		$db = db('nav');

		$list = $db->where('Id in (' . $id . ')')->delete();
		if($list)
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
	public function renav()
	{
		return $this->fetch('./admintpl/renav.html');
	}
	public function addnav()
	{
		return $this->fetch('./admintpl/addnav.html');
	}
	public function do_addnav()
	{
		$data=input('post.');
        $table=db('nav');
		$data['inputtime']=time();
		//return json($data);
		$info=$table->insert($data);
        if($info)
           {
                $data=[
					'msg'=>'添加成功',
					'status'=>1
				]; 
            }
            else{
				$data=[
					'msg'=>'添加失败',
					'status'=>2,
				]; 
            }
			return json($data);
	}
	//导航管理 列表编辑页
	public function upnav()
	{
		$table=db('nav');
		$id=input('Id');
		$list=$table->where('Id='.$id)->find();		
		$list1=$table->distinct(true)->field('level')->order('level asc')->select();
		$list2=$table->distinct(true)->field('top')->order('top asc')->select();
		$this->assign('list',$list);
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
        return $this->fetch('./admintpl/upnav.html');
    }
	//导航管理 列表编辑提交
	public function do_upnav()
	{
		$table=db('nav');
		$id=input('id');
		$data=input();
		unset($data['id']);
		$info=$table->where('Id='.$id)->update($data);
		if($info)
		{
			$this->success('修改成功','Nav/listnav');
		}elseif($info=='false'){
			$this->success('未进行修改','Nav/listnav');
		}else{
			$this->error('修改失败');
		}
	
	}

     public function nav_up(){
        $id=input('Id');
        $db=db('nav');
        $data['static']=0;
        $info=$db->where('Id in('.$id.')')->update($data);
        if($info){
           $result=[
                'msg'=>'还原成功',
                'status'=>1
           ];
           $iddd=[
                'msg'=>'还原成功',
                'status'=>1
           ];
        }else{
            $result=[
                'msg'=>'还原失败',
                'status'=>2
           ];
           $iddd=[
                'msg'=>'还原失败',
                'status'=>2
           ];
        }
        return json($result);
        return json($iddd);
    }
    public function nav_del()
	{
        $id=input('Id');
        $db=db('nav');
        $info=$db->where('id in('.$id.')')->delete();
        if($info){
            $result=[
                'msg'=>'删除成功',
                'status'=>1
           ];
           $iddd=[
                'msg'=>'删除成功',
                'status'=>1
           ];
        }else{
            $result=[
                'msg'=>'删除失败',
                'status'=>2
           ];
           $iddd=[
                'msg'=>'删除失败',
                'status'=>1
           ];
        }
        return json($result);
        return json($iddd);
    }
		    public function rnav()  //导航回收站
    {
        $db=db('nav');
         $info=$db->where('static=1')->paginate(3);
         $page=$info->render();
         $this->assign('list',$info->toArray());
         $this->assign('pages',$page);
        return $this->fetch('./admintpl/rnav.html');
    }
	public function do_delnav(){
		$id=input('Id');
		$db=db('nav');
        $data['static']=1;
        $info=$db->where('Id in('.$id.')')->update($data);
		if($info){
			$this->success('删除成功','Nav/listnav');
		}else{
			$this->error('删除失败');
		}
	}

}