<?php
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="logout"){
    logout();
}
elseif($act=="addAdmin"){
      $mes=addAdmin();
}elseif ($act=="editAdmin"){
    $mes=editAdmin($id);
}elseif ($act=="delAdmin"){
    $mes=delAdmin($id);
}elseif($act=="addCate"){
    $mes=addCate();
}elseif($act=="editCate"){
    $mes=editCate($id);
}elseif($act=="delCate"){
    $mes=delCate($id);
}
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title></title>
</head>
<body>
 <?php 
	if($mes){
	   echo ($mes);
	} 
	
	?> 
</body>
</html>   