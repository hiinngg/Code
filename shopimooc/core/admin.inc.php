<?php

function checkAdmin($sql)
{
    return fetchOne($sql);
}

function checkLogined()
{
    if ($_SESSION['adminId'] == ""&&$_COOKIE["adminId"]=="") {
        alertMes("先登陆！", "login.php");
    }
}

function addAdmin(){
    $link=connect();
    $arr=$_POST;
     if(insert("imooc_admin",$arr)){
        $mes="添加成功！<br /><a href='addAdmin.php'>繼續添加</a>
         |<a href='listAdmin.php'>查看管理員</a>";
        
    }else {
        $mes="添加失敗！<br /><a href='addAdmin.php'>重新添加</a>";
    } 
      return $mes;
}

function logout(){
   $_SESSION=array();
   if(isset($_COOKIE[session_name()])){
       setcookie(session_name(),"",time()-1);
   }
   
   if(isset($_COOKIE['adminId'])){
       setcookie("adminId","",time()-1);
   }
   if(isset($_COOKIE['adminName'])){
       setcookie("adminName","",time()-1);
   }
   session_destroy();
   header("location:login.php");
}

function getAllAdmin(){
    $sql="select id,usename,email from imooc_admin ";
    $rows=fetchALL($sql);
    return $rows;
}

function editAdmin($id){
    $arr=$_POST;
    if(update("imooc_admin",$arr,"id=".$id)){
        $mes="编辑成功！ <a href='listAdmin.php'>查看管理员列表</a>";
    }else{
    $mes="编辑失败！<a href='listAdmin.php'>重新修改</a>";
    }
    return $mes;
    
}

function delAdmin($id){
    if(delete("imooc_admin" ,"id={$id}")){
        $mes="删除成功 <a href='listAdmin.php'>查看管理员</a> ";
        
    }else {$mes="删除失败!!!!! <a href='listAdmin.php'>重新删除</a>";}
    return $mes;
} 

