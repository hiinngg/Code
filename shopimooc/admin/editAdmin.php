<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from imooc_admin where id='".$id."'";
$row=fetchOne($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>编辑管理员</title>
</head>
<body>
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
<table   width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
<td align="right">管理员名称 </td>
<td><input type="text" name="usename" placeholder="<?php echo $row['1'];?>" /></td>
</tr>
<tr>
<td align="right">管理员密码</td>
<td><input type="text" name="password" value="<?php echo $row['2'];?>" /></td>
</tr>
<tr>
<td align="right">管理员邮箱</td>
<td><input type="text" name="email" placeholder="<?php echo $row['3'];?>" /></td>
</tr>
<tr>

<td colspan="2" align="center"><input type="submit"  value="编辑管理员" /></td>
</tr>
<tr>
</table>
</form>
</body>
</html>
