<?php
class TagLibLists extends TagLib{

    protected $tags = array(


         'list' => array('attr' => 'limit,order','close' =>1)// attr 属性列表close 是否闭合（0 或者1 默认为1，表示闭合）

 );

 public function _list ($attr,$content){



       $attr = $this->parseXmlAttr($attr);

       $limit=$attr['limit'];//参数$limit，可通过模板传入参数值

        $order=$attr['order'];//$order$limit，可通过模板传入参数值

       $str='<?php ';

       $str .= '$field=array("id","title","hits");';//定义需要调用的字段

       $str .= '$_list_news=M("News")->field($field)->limit('.$limit.')->order("'.$order.'")->select();';//查询语句

       $str .= 'foreach ($_list_news as $_list_value):';

       $str .= 'extract($_list_value);';

       $str .= '$url=U("read/".$id);?>';//自定义文章生成路径$url

       $str .= $content;

       $str .='<?php endforeach ?>';

       return $str;

       }

 }
