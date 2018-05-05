<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('./admintpl/index.html');
    }
	public function welcome(){
        return $this->fetch('./admintpl/welcome.html');
    }
	public function add(){
        return $this->fetch('./admintpl/add.html');
    }
	public function addadvert(){
        return $this->fetch('./admintpl/addadvert.html');
    }
	public function listnav(){
        return $this->fetch('./admintpl/listnav.html');
    }
	public function renav(){
        return $this->fetch('./admintpl/renav.html');
    }
	public function addnav(){
        return $this->fetch('./admintpl/addnav.html');
    }
}
