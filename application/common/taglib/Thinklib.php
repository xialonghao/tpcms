<?php
    namespace app\common\taglib;

    use Think\Template\TagLib;

    class Thinklib extends TagLib{
        protected $tags=[
            'list'=>['attr' => 'type,order,limit,', 'close'=>1],


            ];
       public function tagList($tag,$content){
           $type=$tag['type'];
           $order=$tag['order'];
           $limit=$tag['limit']?$tag['limit']:'';
           $str='<?php ';
           $str.='$react=db("表")->where("sex=".$tyope)->order(\''.$order.'\')->limit("'.$limit.'")->select();';
           $str.='foreach ($react as $v): ?>';
           $str=$content;
           $str='<?php endforeach ?>';
       }
    }
?>