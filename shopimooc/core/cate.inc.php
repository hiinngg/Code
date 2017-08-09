<?php

function addCate(){
    $arr=$_POST;
    if(insert("imooc_cate",$arr)){
        $mes="分类添加成功<a href='addCate.php'>继续添加</a>
            | <a href='listCate.php'>查看分类</a>  ";
        
    }else{$mes="分类添加失败  <a href='addCate.php'>重新添加</a>"; }
    return $mes;
}

function editCate($id){
    $arr=$_POST;
    if(update("imooc_cate",$arr,"id=".$id)){
        $mes="编辑成功！ <a href='listCate.php'>查看分类列表</a>";
    }else{
        $mes="编辑失败！<a href='listCate.php'>重新修改</a>";
    }
    return $mes;
}

function delCate($id){
    if(delete("imooc_cate" ,"id={$id}")){
        $mes="删除成功 <a href='listCate.php'>查看分类</a> ";
    
    }else {$mes="删除失败!!!!! <a href='listCate.php'>重新删除</a>";}
    return $mes;
}