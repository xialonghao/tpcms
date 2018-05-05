<?php
namespace app\admin\controller;

use think\Controller;

class News extends Controller{
    public function newslist()    //资讯列表
    {  

       return $this->fetch('./admintpl/newslist.html');
    }
    
    public function newsadd()    //资讯添加
    {  

       return $this->fetch('./admintpl/newsadd.html');
    }
    public function newsup()    //资讯修改
    {  

       return $this->fetch('./admintpl/newsup.html');
    }
    public function newsrecover()    //资讯回收站
    {  

       return $this->fetch('./admintpl/newsrecover.html');
    }

     public function newspage()    //评论列表
    {  

       return $this->fetch('./admintpl/newspage.html');
    }
    
    public function catelist()    //资讯分类列表
    {  

       return $this->fetch('./admintpl/catelist.html');
    }
    public function cateadd()    //资讯分类添加
    {  

       return $this->fetch('./admintpl/cateadd.html');
    }
     public function cateup()    //资讯分类修改
    {  

       return $this->fetch('./admintpl/cateup.html');
    }
     public function caterecover()    //资讯分类回收站
    {  

       return $this->fetch('./admintpl/caterecover.html');
    }
}
