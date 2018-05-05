<?php

namespace app\common\taglib;

use think\template\TagLib;

/**
 * CX标签库解析类
 * @category   Think
 * @package  Think
 * @subpackage  Driver.Taglib
 * @author    liu21st <liu21st@gmail.com>
 */
class Think extends Taglib
{

    // 标签定义
    protected $tags = [
        'coninfo' => ['attr' => 'id', 'close' => 0],
        'memberlist' => ['attr' => 'value,name,type,sex', 'close' => 1],
        'glist' => ['atrr' => 'action,num,page,limit,sex', 'close' => 1],
        'logo'=>['attr'=>'img,height,width','close'=>0],
        'lists'=>['attr'=>'title,order,limit,shopcate,cate,area,business,like,sql','close'=>1],
        'news'=>['attr'=>'title,order,limit,sql,like'],
    ];

    public function tagconinfo($tag, $content)
    {
        $id = $tag['id'];
        $info = db('admin')->where('id=' . $id)->find();
        return $info['username'];
    }

    public function tagMemberlist($tag, $content)
    {
        $name = $tag['sex'] == '男' ? 1 : 0;
        $str = '<?php ';
        $str .= '$result = db("admin")->where("sex=\'' . $name . '\'")->select();';
        $str .= 'foreach($result as $vo):';
        $str .= '?>';
        $str .= $content;
        $str .= '<?php endforeach?>';
        return $str;

    }

    public function tagGlist($tag, $content)
    {
        $name = $tag['action']=='男'?1:0;
        $where ='';
        if ($name != '') {
            $where .= 'sex=' . $name;
        }
        $order = isset($tag['order'])?$tag['order']:'id desc';
        $limit = isset($tag['limit'])?$tag['limit']:'';
        $str = '<?php ';
        $str .= '$result = db("admin")->where(\'' . $where . '\')->order(\'' . $order . '\')->limit("' . $limit . '")->select();';
        $str .= 'foreach($result as $v): ?>';
        $str .= $content;
        $str .= '<?php endforeach?>';
        return $str;
    }
    public function tagLogo($tag,$content){
                    $logo=$tag['logo'];
                    $width=$tag['width'];
                    $height=$tag['height'];
                    $photo=db('banner')->where('id='.$logo)->find();
                    $drr = $photo['photo'];
                    return "<img src='".$drr."' width='".$width."' height='".$height."'/>";
    }
    public function tagLists($tag,$content){
        $limit = isset($tag['limit'])?$tag['limit']:'';
        $order = $tag['order'];
        $like=isset($tag['like'])?' title like \'%'.$tag['like'].'%\'': '';
        $sqls=isset($tag['sqls']) ? $tag['sqls'] : '';
        if($sqls!=''){
            $str='<?php ';
            $str .='$results= db()->query(\''.$sqls.'\'); ';
            $str .='foreach($results as $v):';
            $str .='?>';
            $str .=$content;
            $str .='<?php endforeach ?>';
            return $str;exit;
        }
        $str='<?php ';
        $str.='$result=db("news")->where("'.$like.'")->order("'.$order.'")->limit("'.$limit.'")->select();';
        $str .= 'foreach($result as $v): ?>';
        $str.=$content;
        $str.='<?php endforeach ?>';
        return $str;
    }
    public function tagNews($tag,$content){
        $limit=isset($tag['limit'])?$tag['limit']:'';
        $order=$tag['order'];
        if(isset($tag['order'])!=''){
            $tag['order'];
        }else{
            $order=='';
        }
        $like=$tag['like'];
        $where='';
        if(isset($tag['like'])!=''){
            $where.= 'and title like \'%'.$like.'%\'';
        }else{
            $tag['like']=='';
        }
        $sql=$tag['sql'];
        if(isset($tag['sql'])!=''){
            $str='<?php ';
            $str.= '$result=db()->query("'.$sql.'");';
            $str.= ' foreach ($result as $v): ?>';
            $str.=$content;
            $str.='<?php endforeach ?>';
            return $str;
            
        }else{
            $str='<?php';
            $str.='$realut=db()->where(\'$where\'.\'$like\')->order("'.$order.'")->limit("'.$limit.'");';
            $str.='foreach $realut as $v:';
            $str.='?>';
            $str.=$content;
            $str.='<? endforeach ?>';
            return $str;
        }

    }






}


//引用自定义
