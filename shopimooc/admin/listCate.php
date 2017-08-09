<?php 
require_once '../include.php';
$sql="select * from imooc_cate";
$totalRows=getResultNum($sql);
$pageSize=2;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select id,cName from imooc_cate order by id limit {$offset},{$pageSize}";
$rows=fetchALL($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
<div class="details_operation clearfix">
<div class="bui_select">
<input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addCate()">
</div>

</div>
<!--���-->
<table class="table" cellspacing="0" cellpadding="0">
<thead>
<tr>
<th width="15%">编号</th>
<th width="25%">分类名称</th>
<th>操作</th>
</tr>
</thead>
<tbody>
<?php  foreach($rows as $row):?>
                            <tr>
                                <!--�����id��for�����c1 ��Ҫѭ������-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['cName'];?></td>
                                
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editCate(<?php echo $row['id'];?>)"><input type="button" value="ɾ删除" class="btn"  onclick="delCate(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">
	function addCate(){
    window.location="addCate.php";
		}
	function  editCate(id){
       window.location="editCate.php?id="+id;
		}	
	 function delCate(id){
        if(window.confirm("删除了就不能修改了哦！！！")){
          window.location="doAdminAction.php?act=delCate&id="+id;
            }
		 }
</script>
</html>