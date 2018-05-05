<?php
namespace app\admin\controller;

use think\Controller;

use think\Request;

class Member extends Controller{
    public function useradd(){  //用户添加
        $request = Request::instance();
        $db=db('frontuser');
        if($request->isPost()){
            $data=input();
            $file=request()->file('headportrait');
            if($file){
                $info=$file->move(config('upload_path'));//图片地址
                $data['headportrait']=$info->getSavename();
            }else{
                unset($data['headportrait']);
            }
            //密码存md5值 删除确认密码字段
            $data['password']=MD5($data['password']);
            unset($data['password2']);
            unset($data['headportrait-1']);
            $data['regdate']=date('Y-m-d',time());
            $data['ip']=$request->ip();
            $data['region']='山东省临沂市';
            $info=$db->insert($data);
            if($info){
                $this->success('添加成功','Member/userlist');
            }else{
                $this->error('添加失败','Member/useradd');
            }
        };
        return $this->fetch('./admintpl/useradd.html');
    } //用户添加
    public function userlist(){  //用户列表
        $content = input('content')?input('content'):'';
        $db=db('frontuser');
        if(!empty($content)){
            $list=$db->order('Id desc')->where('recycle',0)->whereLike('nickname',"%".$content."%")->paginate('4',false,['query' => request()->param()]);
            $info = $db->order('id asc')->where('recycle',0)->whereLike('nickname',"%".$content."%")->select();
            $num = count($info);
            $this->assign('name',$content);
        }else{
            $list = $db->order('id asc')->where('recycle',0)->paginate('4');
            $info=$db->field('id,nickname,sex,loginnum,lastdate,ip,lock')->order('id asc')->where('recycle=0')->select();
            $num = count($info);
        }
        $this->assign('page',$list->render());
        $info=$list->toArray()['data'];
        $this->assign('num',$num);
        $this->assign('info',$info);
        return $this->fetch('./admintpl/userlist.html');
    } //用户列表
    public function userdel(){      //用户删除
        $db=db('frontuser');
        $id=input('id');
        $info=$db->where('id in ('.$id.')')->delete();

        if($info){
            return json('succ');
            //$this->success('删除成功','Member/userlist');
        }else{
            return json('error');
            //$this->error('删除失败');
        }
    }   //用户删除
    //用户封禁
    public function userban(){      //用户封禁
        $db=db('frontuser');
        $id=input('id');
        $user=$db->where('id',$id)->find();
        if($user['lock']==1){
            $user['lock']=0;
        }else{
            $user['lock']=1;
        }
        $info=$db->where('id',$id)->update($user);
        if($info){
            return json('succ');
            //$this->success('封禁/解封成功','Member/userlist');
        }else{
            return json('error');
            //return json('file');
            //$this->error('封禁失败');
        }
    }   //用户封禁
    public function userup(){       //用户修改
        if(request()->isPost()){
            $data=input('post.');
			//c通过id查询数据库信息如果相同提示未进行任何操作
            $file=request()->file('headportrait');
            if($file){
                $fileinfo=$file->move(config('upload_path'));
                $data['headportrait']=$fileinfo->getSavename();
                unset($data['headportrait-1']);
            }else{
                unset($data['headportrait-1']);
            }
            $db=db('frontuser');
            $info=$db->where('id',$data['id'])->update($data);
            if($info!==false){
                $this->success('修改成功','Member/userlist');
            }else{
                $this->error('修改失败');
            }
        }
        $id=input('id');
        $db=db('frontuser');
        $user=$db->where('id',$id)->field('id,nickname,headportrait,sex,password,email,phone')->find();
        $this->assign('user',$user);
        return $this->fetch('./admintpl/userup.html');
    }   //用户修改
    //用户等级列表
    public function usergradelist(){ //用户等级
        $db = db('frontuser');
        $list = $db->field('id,nickname,vipid,regdate,email')->order('id desc')->paginate(4);
        $this->assign('info', $list);
        $infos = $list->toArray();
        $page = $list->render();
        $this->assign('page', $page);
        return $this->fetch('./admintpl/user_grade_list.html');
    }   //用户等级
    public function usergradeadd(){         //等级添加
        $list = db('rank')->select();
        $this->assign('vipname', $list);
        return $this->fetch('./admintpl/user_grade_add.html');
    }       //等级添加
    public function usergradedoadd() {        //等级添加处理
        $db = db('rank');
        $info = input('nickname');
        $infos = [
            'rank' => $info,
        ];
        $data = $db->insert($infos);
        if ($data) {
            $this->success('修改成功');
        } else {
            $this->error('修改失败');

        }
    }   //等级添加处理
    public function usergradeup(){          // 等级修改
        if (Request::instance()->isPost()) {
            $data = input('post.');
            print_r($data);
        }
        $id = input('Id');
        $db = db('frontuser');
        $lists = $db->where('id=' . $id)->find();
        $vipid = $lists['vipid'];
        $list = db('rank')->select();
        $this->assign('vipid', $vipid);
        $this->assign('vipname', $list);
        $this->assign('list', $lists);
        return $this->fetch('./admintpl/user_grade_up.html');
    }       // 等级修改
    public function do_usergradeup(){        //等级修改处理方法
        $data = input('post.');
        $id = input('id');
        $vipid = input('vipid');
        $vipdata = [
            'vipid' => $vipid,
        ];
        $db = db('frontuser');
        $info = $db->where('id=' . $id)->update($vipdata);
        if ($info) {
            $this->success('修改成功');

        } elseif ($info !== false) {
            $this->success('未修改');

        } else {
            $this->error('修改失败');

        }

    }   //等级修改处理方法
    public function rankdel()               //等级删除
    {
        $id = input('Id');
        $db = db('frontuser');
        $info = $db->where('id in (' . $id . ')')->delete();
        if ($info) {
            return json('succ');
        } else {
            return json('error');
        }

    }
    //用户解禁列表
    public function titleslist(){       //封禁列表
        $table=db('frontuser');
        $list=$table->where('lock',1)->paginate(4);
        //分页
        $page=$list->render();
        $this->assign('info',$list->toArray());
        $this->assign('pages',$page);
        return $this->fetch('./admintpl/titleslist.html');
    }       //封禁列表
    public function do_jiechu(){             //解封方法
        $table=db('frontuser');
        $id=input('post.id');
        $data['lock']=0;
        $list=$table->where('id='.$id)->update($data);
        if($list){
            return json('succ');
        }else{
            return json('error');
        }
    }           //解封方法
    //回收站列表
    public function recycle_bin(){              //回收站列表
        $db=db('frontuser');
        $content = input('content')?input('content'):'';
        if(!empty($content)){
            $list=$db->order('Id desc')->where('recycle',1)->whereLike('nickname',"%".$content."%")->paginate('4',false,['query' => request()->param()]);
            $info = $db->order('id asc')->where('recycle',1)->whereLike('nickname',"%".$content."%")->select();
            $num = count($info);
            $this->assign('name',$content);
        }else{
            $list = $db->order('id asc')->where('recycle',1)->paginate('4');
            $info = $db->order("Id asc")->where('recycle',1)->select();
            $num = count($info);
        }
        $this->assign('page',$list->render());
        $info=$list->toArray()['data'];
        //echo "<pre>";
        //echo print_r($info);exit;
        $this->assign('num',$num);
        $this->assign('name',$info);
        return $this->fetch('./admintpl/recycle_bin.html');
    }       //回收站列表
    public function do_reback(){            // 回收站还原
        $id=input('Id');
        $data['recycle']=0;
        $info=db('frontuser')->where('id in('.$id.')')->update($data);
        if($info){
            $this->success('还原成功');
        }else{
            $this->error('还原失败');
        }
    }           // 回收站还原
    public function do_recyle_bin(){            //彻底删除和清空
        $id=input('Id');
        $db=db('frontuser');
        $list=$db->where('id in('.$id.')')->delete();
        if($list){
            return json('succ');
            //$this->success('删除成功');
        }else{
            return json('error');
            //$this->error('删除失败');
        }
    }       //彻底删除和清空
}
