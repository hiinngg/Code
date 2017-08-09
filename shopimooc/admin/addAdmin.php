<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title></title>
</head>
<body>
	<form action="doAdminAction.php?act=addAdmin" method="post">
	<table   width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
	<td align="right">管理員名稱 </td>
	<td><input type="text" name="usename" placeholder="請輸入管理員名稱" /></td>
	</tr>
		<tr>
	<td align="right"> 管理員密碼</td>
	<td><input type="text" name="password"  /></td>
	</tr>
		<tr>
	<td align="right"> 管理員郵箱</td>
	<td><input type="text" name="email" placeholder="請輸入管理員郵箱" /></td>
	</tr>
	   <tr>
	
	<td colspan="2" align="center"><input type="submit"  value="添加管理員" /></td>
	   </tr>
	<tr>
	</table>
	</form>
</body>
</html>
