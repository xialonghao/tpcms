<?php
/**
 * Created by PhpStorm.
 * User: 13058
 * Date: 2017/10/10
 * Time: 11:28
 */
namespace app\custom\taglib;

use think\Template\TagLib;
class Custom extends TagLib
{
    // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
    protected $tags = [
        'newslist' => ['attr' => 'field,order,limit,like,sql,hot,name,where,page', 'close' => 1,'level'=>2],
        'flink' => ['attr' => 'order,limit,thumb,name,where', 'close' => 1],
        'sql' => ['attr' => 'sql,name', 'close' => 1],
        'adlist' =>['attr' =>'page,where,like,field,order,limit,sql','close' => 1],
        'banlist' => ['attr' => 'field,order,limit,like,sql,hot,name,where,page', 'close' => 1,'level'=>2],
        'commentlist'=>['attr'=>'title,num,time,like,sql,order,limit,where','close'=>1],
        'navlist'=>['attr'=>'title,num,time,like,sql,order,limit','close'=>1],
    ];


    /*新闻列表标签*/
    public function tagNewslist($tag,$content){
        $field = isset($tag['field']) ? $tag['field'] :'*';           //读取字段
        $where = isset($tag['where']) ?  $tag['where'] : '1=1';     //where条件
        $order = isset($tag['order']) ? $tag['order'] : 'id asc';      //排序方式
        $like = isset($tag['like']) ? ' and ' . $tag['like']   : '';  //模糊查询
        $sql = isset($tag['sql']) ? $tag['sql'] : false;        //sql语句
        $page = isset($tag['page']) ? $tag['page'] == 'true' ? true : false : false;
        $hot = isset($tag['hot']) ? $tag['hot'] == 'true' ? true : false : false;
        //是否按照浏览量排序
        $name = isset($tag['name']) ? $tag['name'] : 'v';        //循环变量
        $where = $where.$like;
        $countinfo = db('news')->where($where)->count();         //总条数
        $row = isset($tag['limit']) ? $tag['limit'] : $countinfo;   //获取limit
        $countpage = ceil($countinfo/$row);       //总页数
        $pagestr = $page ? '"':'\' \'';
        //循环分页
        if($page){
            $pagestr .= '<ul style=\'list-style: none;clear:both;height: auto;overflow: hidden;\'>';
            for($i=1;$i<=$countpage;$i++){
                if($countpage==1) break;
                $pagestr .= '<li style=\'float: left;margin-left: 10px\'><a style=\'text-decoration: none;color: #000;font-size: 18px;\' href=\'?page='.$i.'\'>' . $i . '</a></li>';
            }
            $pagestr .= "</ul>\"";
        }
        //sql语句查询
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
            $str .= '$info=db(\'news\')->field(\''.$field.'\')->where("'.$where.$like.'")->order(\'looknum desc\')->limit(($pages-1)*'.$row.','.$row.')->select();';
        }else{
            $str .= ' $info=db(\'news\')->field(\''.$field.'\')->where("'.$where.$like.'")->order(\''.$order.'\')->limit(($pages-1)*'.$row.','.$row.')->select();';
        }
        $str .= '$page='.$pagestr.';';
        $str .= ' foreach($info as $'.$name.'): ?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }


    /*友情链接*/
    public function tagFlink($tag,$content){
        $order = isset($tag['order']) ? $tag['order'] : 'id asc';      //排序方式
        $limit = isset($tag['limit']) ? "->limit('".$tag['limit']."')" : '';  //读取条数
        $where = isset($tag['where']) ?  $tag['where'] : '1=1';     //where条件
        $page = isset($tag['page']) ? $tag['page'] == 'true' ? true : false : false;        //sql语句
        $thumb = isset($tag['thumb']) ? $tag['thumb'] == 'true' ? true : false : false; //是否显示图片
        $name=isset($tag['name']) ? $tag['name'] : 'v';        //循环变量
        $countinfo = db('friendlink')->where($where)->count();         //总条数
        $row = isset($tag['limit']) ? $tag['limit'] : $countinfo;   //获取limit
        $countpage = ceil($countinfo/$row);       //总页数
        $pagestr = $page ? '"':'\' \'';
        //循环分页
        if($page){
            $pagestr .= '<ul style=\'list-style: none;clear:both;height: auto;overflow: hidden;\'>';
            for($i=1;$i<=$countpage;$i++){
                if($countpage==1) break;
                $pagestr .= '<li style=\'float: left;margin-left: 10px\'><a style=\'text-decoration: none;color: #000;font-size: 18px;\' href=\'?page='.$i.'\'>' . $i . '</a></li>';
            }
            $pagestr .= "</ul>\"";
        }
        $str  = '<?php ';
        if($thumb == 'true'){
            $str .= '$info=db(\'friendlink\')->where(\'photo is not null\')->order(\''.$order.'\')'.$limit.'->select();';
        }else{
            $str .= '$info=db(\'friendlink\')->where(\'photo is null\')->order(\''.$order.'\')'.$limit.'->select();';
        }
        $str .= '$page='.$pagestr.';';
        $str .= ' foreach($info as $'.$name.'): ?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }


    /*sql语句查询*/
    public function tagSql($tag,$content){
        $sql=isset($tag['sql']) ? $tag['sql'] : '';        //sql语句
        $name=isset($tag['name']) ? $tag['name'] : 'v';        //循环变量
        $str  = '<?php ';
        $str .= '$info=db()->query(\''.$sql.'\');';
        $str .= ' foreach($info as $'.$name.'): ?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }


    /*广告列表*/
    public function tagAdlist($tag,$content){
        $field = isset($tag['field'])?$tag['field']:'';
        $order = isset($tag['order'])?$tag['order']:'id asc';
        $sql = isset($tag['sql'])?$tag['sql']:'0';
        $like = isset($tag['like'])?' and '.$tag['like']: '';
        $where = isset($tag['where'])?$tag['where']:'1=1';
        $page = isset($tag['page']) ? $tag['page'] == 'true' ? true : false : false;
        $name=isset($tag['name']) ? $tag['name'] : 'v';        //循环变量
        $where=$where.$like;
        $countinfo = db('ad')->where($where)->count();         //总条数
        $row = isset($tag['limit']) ? $tag['limit'] : 10;   //获取limit
        $countpage = ceil($countinfo/$row);       //总页数
        $pagestr = $page ? '"':'\' \'';
        //循环分页
        if($page){
            $pagestr .= '<ul style=\'list-style: none;clear:both;height: auto;overflow: hidden;\'>';
            for($i=1;$i<=$countpage;$i++){
                if($countpage==1) break;
                $pagestr .= '<li style=\'float: left;margin-left: 10px\'><a style=\'text-decoration: none;color: #000;font-size: 18px;\' href=\'?page='.$i.'\'>' . $i . '</a></li>';
            }
            $pagestr .= "</ul>\"";
        }

        if($sql){
            $str = '<?php $info = db()->query(\''.$sql.'\'); ';
        }else{
            $str = '<?php $info=db(\'ad\')->field(\''.$field.'\')->where("'.$where.$like.'")->order(\''.$order.'\')->limit(($pages-1)*'.$row.','.$row.')->select();';
        }

        $str .= '$page='.$pagestr.';';
        $str .= ' foreach($info as $'.$name.'):?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
            return $str;
    }



    /*banner列表*/
    public function tagBanlist($tag,$content){
        $field = isset($tag['field'])?$tag['field']:'*';
        $order = isset($tag['order'])?$tag['order']:'id asc';
        $sql = isset($tag['sql'])?$tag['sql']:'0';
        $like = isset($tag['like'])?' and '.$tag['like']: '';
        $where = isset($tag['where']) ? $tag['where']:'1=1';
        $status = isset($tag['status']) ? $tag['status'] == 'true' ? false : true : true;
        $status ? $where = 'static=1 and ' . $where.$like : $where='static=0 and ' . $where.$like;

        $page = isset($tag['page']) ? $tag['page'] == 'true' ? true : false : false;
        $name=isset($tag['name']) ? $tag['name'] : 'v';        //循环变量
        $countinfo = db('banner')->where($where)->count();         //总条数
        $row = isset($tag['limit']) ? $tag['limit'] : $countinfo;   //获取limit
        $countpage = ceil($countinfo/$row);       //总页数
        $pagestr = $page ? '"':'\' \'';
        //循环分页
        if($page){
            $pagestr .= '<ul style=\'list-style: none;clear:both;height: auto;overflow: hidden;\'>';
            for($i=1;$i<=$countpage;$i++){
                if($countpage==1) break;
                $pagestr .= '<li style=\'float: left;margin-left: 10px\'><a style=\'text-decoration: none;color: #000;font-size: 18px;\' href=\'?page='.$i.'\'>' . $i . '</a></li>';
            }
            $pagestr .= "</ul>\"";
        }

        if($sql){
            $str = '<?php $info = db()->query(\''.$sql.'\'); ?>';
        }else{
                $str = '<?php $info=db(\'banner\')->field(\''.$field.'\')->where("'.$where.$like.'")->order(\''.$order.'\')->limit(($pages-1)*'.$row.','.$row.')->select(); ?>';
        }
        $str .= '<?php ';
        $str .= '$page='.$pagestr.';';
        $str .= ' foreach($info as $'.$name.'):?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
            return $str;

    }


    /*评论列表*/
    public function tagCommentlist($tag,$content){
        $field = isset($tag['field']) ? $tag['field'] :'';
        $order = isset($tag['order']) ? $tag['order'] : 'id asc';
        $like = isset($tag['like']) ? " and " . $tag['like'] : ' and 1=1';
        $sql = isset($tag['sql']) ? $tag['sql'] : false;        //sql语句
        $page = isset($tag['page']) ? $tag['page'] == 'true' ? true : false : false;
        $name=isset($tag['name']) ? $tag['name'] : 'v';        //循环变量
        $where = isset($tag['where'])?$tag['where']:'1=1';
        $where=$where.$like;
        $countinfo = db('comment')->where($where)->count();         //总条数
        $row = isset($tag['limit']) ? $tag['limit'] : $countinfo;   //获取limit
        $countpage = ceil($countinfo/$row);       //总页数
        $pagestr = $page ? '"':'\' \'';
        //循环分页
        if($page){
            $pagestr .= '<ul style=\'list-style: none;clear:both;height: auto;overflow: hidden;\'>';
            for($i=1;$i<=$countpage;$i++){
                if($countpage==1) break;
                $pagestr .= '<li style=\'float: left;margin-left: 10px\'><a style=\'text-decoration: none;color: #000;font-size: 18px;\' href=\'?page='.$i.'\'>' . $i . '</a></li>';
            }
            $pagestr .= "</ul>\"";
        }
        if($sql){
            $str  = '<?php ';
            $str .= '$info=db()->query(' . "\"" . $sql . "\"" . ');';
            $str .= ' foreach($info as $' .$name. '):';
            $str .= ' ?>';
            $str .= $content;
            $str .= '<?php endforeach; ?>';
            return $str;
        }
            $str = '<?php $info=db(\'comment\')->field(\''.$field.'\')->where("'.$where.$like.'")->order(\''.$order.'\')->limit(($pages-1)*'.$row.','.$row.')->select(); ';
        $str .= '$page='.$pagestr.';';
        $str .= ' foreach($info as $v):';
        $str .= ' ?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }


    /*导航列表*/
    public function tagNavlist($tag,$content){
        $field = isset($tag['field'])?$tag['field']:'';
        $order = isset($tag['order'])?$tag['order']:'id asc';
        $limit = isset($tag['limit'])?$tag['limit']:'';
        $sql = isset($tag['sql'])?$tag['sql']:'0';
        $like = isset($tag['like'])?' and '.$tag['like']: '';
        $where = isset($tag['where'])?$tag['where']:'1=1';
        $name=isset($tag['name']) ? $tag['name'] : 'v';        //循环变量
        if($sql){
            $str = '<?php $info = db()->query(\''.$sql.'\'); ?>';
        }else{
            $str = '<?php $info = db("nav")->field(\''.$field.'\')->where("'.$where.$like.'")->order(\''.$order.'\')->limit(\''.$limit.'\')->select(); ?>';
        }
        $str .= '<?php foreach($info as $'.$name.'):?>';
        $str .= $content;
        $str .= '<?php endforeach; ?>';
        return $str;
    }
}