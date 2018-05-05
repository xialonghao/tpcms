<?php
namespace app\admin\controller;

use think\Controller;
class Login extends Controller{
public function login(){
			if(session('id')==''){
			//$ip = $request->ip();
				 //echo $ip;
			//$this->redirect('Login/login');
		 }
		 else{
			 return "您已登陆";
			 //$this->redirect('Aduser/index');
		}
			return $this->fetch('./admintpl/login.html');
		}
		public function do_login(){
		$db=db('admin');
		$data=input('post.');
		
		 $data['password']=md5($data['password']);
		// print_r($data);
		
		   $list = $db->where(['username'=>$data['username'],'password'=>$data['password']])->find();
		 
			if($list){
				
				 session('id',$list['id']);
				 //session('name',$list['username']);
				$data['id']=$list['id'];
				 $data['status']=1;
				  $data['msg']='成功';
            }else{
				$data['msg']='fail';
			
                 // $data=[
                   // 'status'=>2,
                     // 'msg'=>'你输入的密码和账户名不匹配',
                // ];
            }
				return json($data);
		}
}
		?>