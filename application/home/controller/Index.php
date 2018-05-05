<?php
namespace app\home\controller;

use think\Controller;

class Index extends Controller
{
   public function index()
    {

        return $this->fetch('./templates/defaults/index.html');
    }
    public function about(){
       return $this->fetch('templates/defaults/about.html');
    }
    public function news(){
        return $this->fetch('templates/defaults/news.html');
    }
    public function course(){
        return $this->fetch('templates/defaults/course.html');
    }
    public function courses(){
        return $this->fetch('templates/defaults/courses1.html');
    }
    public function eDetail(){
        return $this->fetch('templates/defaults/eDetail.html');
    }
    public function exam(){
        return $this->fetch('templates/defaults/exam.html');
    }
    public function nDetail(){
        return $this->fetch('templates/defaults/nDetail.html');
    }
    public function notice(){
        return $this->fetch('templates/defaults/notice.html');
    }
    public function ownTopic(){
        return $this->fetch('templates/defaults/ownTopic.html');
    }
    public function ownTopics(){
        return $this->fetch('templates/defaults/owTopics1.html');
    }
    public function password(){
        return $this->fetch('templates/defaults/password.html');
    }
    public function personal(){
        return $this->fetch('templates/defaults/personal.html');
    }
    public function publics(){
        return $this->fetch('templates/defaults/public.html');
    }
    public function register(){
        return $this->fetch('templates/defaults/register.html');
    }
    public function resource(){
        return $this->fetch('templates/defaults/resource.html');
    }
    public function resources(){
        return $this->fetch('templates/defaults/resource1.html');
    }
    public function schollmate(){
        return $this->fetch('templates/defaults/schollmate.html');
    }
    public function tcDetail(){
        return $this->fetch('templates/defaults/tcDetail.html');
    }
    public function tDetail(){
        return $this->fetch('templates/defaults/tDetail.html');
    }
    public function tDetails(){
        return $this->fetch('templates/defaults/tDetail1.html');
    }
    public function teachers(){
        return $this->fetch('templates/defaults/teachers.html');
    }
    public function teacherss(){
        return $this->fetch('templates/defaults/teachers1.html');
    }
    public function topic(){
        return $this->fetch('templates/defaults/topic.html');
    }
    public function upload(){
        return $this->fetch('templates/defaults/upload.html');
    }
    public function vDetail(){
        return $this->fetch('templates/defaults/vDetail.html');
    }

}
