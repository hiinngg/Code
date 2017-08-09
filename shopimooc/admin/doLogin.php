<?php 
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if($verify==$verify1){
	$sql="select * from imooc_admin where usename='".$username."'  and password='".$password."'";
	$row=checkAdmin($sql);
	if($row){
		//如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['0'],time()+7*24*3600);
			setcookie("adminName",$row['1'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['1'];
		$_SESSION['adminId']=$row['0'];
		alertMes("登陆成功","index.php");
	}else{
		alertMes("登陆失败，重新登陆","login.php");
	}
}else{
	alertMes("验证码错误","login.php");
}