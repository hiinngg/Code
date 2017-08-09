<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from imooc_cate  where id='".$id."'";
$row=fetchOne($sql);

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>�༭����Ա</title>
</head>
<body>
<form action="doAdminAction.php?act=editCate&id=<?php echo $id;?>" method="post">
<table   width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
<tr>
<td align="right">分类编号</td>
<td><?php echo $row[0];?></td>
</tr>
<tr>
<td align="right">分类名称</td>
<td><input type="text" name="cName" value="<?php echo $row[1];?>" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit"  value="修改分类" /></td>
</tr>
<tr>
</table>
</form>
</body>
</html>
