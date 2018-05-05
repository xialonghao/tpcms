<?php
namespace app\admin\controller;

use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch('./admintpl/index.html');
    }
     public function lists()    //资讯列表
    {  
       return $this->fetch('./admintpl/list.html');
    }
    public function welcome()    //资讯列表
    {  

       return $this->fetch('./admintpl/welcome.html');
    }
}
