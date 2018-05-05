<?php
namespace app\custom\taglib;

use think\Template\TagLib;

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2017/10/16
 * Time: 10:32
 */
 class Think extends TagLib{

     protected $tags=[
         'newslist'=>['attr'=>'field,order,limit,name,like,sql,hot','close'=>1],
         'comment'=>['attr'=>'commentid,title,num,time,','close'=>1],

     ];

     public function tagNewslist($tag,$content){
         $field = isset($tag['field']) ? $tag['field'] :'*';           //读取字段 如果没有返回全部字段
         $order = isset($tag['order']) ? $tag['order'] : 'id asc';      //排序方式 如果没有按id降序
         $limit = isset($tag['limit']) ? "->limit('".$tag['limit']."')" : '';  //读取条数
         $like = isset($tag['like']) ? " title like '%" . $tag['like'] . "%'" : '';  //模糊查询
         $sql = isset($tag['sql']) ? $tag['sql'] : false;        //sql语句
         $hot = isset($tag['hot']) ? $tag['hot'] == 'true' ? true : false : false;   //是否按照浏览量排序 默认false

         if($sql){
             $str  = '<?php ';
             $str .= '$info=db()->query(' . "\"" . $sql . "\"" . ');';
             $str .= ' foreach($info as $v):';
             $str .= ' ?>';
             $str .= $content;
             $str .= '<?php endforeach; ?>';
             return $str;
         }
         $str  = '<?php ';
         if($hot){
             $str .= '$info=db(\'news\')->field(\''.$field.'\')->where("'.$like.'")->order(\'looknum desc\')'.$limit.'->select();';
         }else{
             $str .= '$info=db(\'news\')->field(\''.$field.'\')->where("'.$like.'")->order(\''.$order.'\')'.$limit.'->select();';
         }

         $str .= ' foreach($info as $v):';
         $str .= ' ?>';
         $str .= $content;
         $str .= '<?php endforeach; ?>';
         return $str;
     }
     public function tagComment($tag,$content){
         $num = isset($tag['num']) ? $tag['num'] :'*';           //读取字段 如果没有返回全部字段
         $order = isset($tag['order']) ? $tag['order'] : 'id asc';      //排序方式 如果没有按id降序
         $limit = isset($tag['limit']) ? "->limit('".$tag['limit']."')" : '';  //读取条数
         $sql = isset($tag['sql']) ? $tag['sql'] : false;        //sql语句
         $hot = isset($tag['hot']) ? $tag['hot'] == 'true' ? true : false : false;   //是否按照浏览量排序 默认false
         $name=$tag['name'];
         $str='<?php ';
         $str.='$reult=db("comment")->order(\''.$order.'\')->select();';
         $str.='foreach ($reult as $name):';
         $str.='?>';
         $str.=$content;
         $str.='<?php endforeach?>';
     }

 }

