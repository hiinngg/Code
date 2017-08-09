<?php
require_once '../lib/string.func.php';
// print_r($_FILES);
/* header("content=text/html;charset=utf-8");
$filename = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$tmp_name = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];
$size = $_FILES['myfile']['size']; */


clearstatcache();

function uploadFile($fileInfo,$path="uploads")
{
  if ($fileInfo['error'] == UPLOAD_ERR_OK) {
    $ext = getExt($fileInfo['error']); 
    $filename = getUnitName() . "." . $ext;
    //$destination = "upload/" . $filename;
    if (! file_exists($path)) {
        mkdir($path, 0777, true);
    }
    $destination = $path . "/" . $filename;
    if (is_uploaded_file($fileInfo['tmp_name'])) {
        if (move_uploaded_file($fileInfo['tmp_name'], $destination)) {
            $mes = "文件移动成功";
        } else {
            $mes = "文件移动失败";
        }
    } else {
        $mes = "文件不是通过HTTP上传的";
    }
} else {
    switch ($fileInfo['error']) {
        case 1:
            $mes = "超过了配置文件上传文件的大小";
            break;
        case 2:
            $mes = "超过了表弟那设置上传文件的大小";
            break;
        case 3:
            $mes = "文件部分被上传";
            break;
        case 4:
            $mes = "没有文件被上传";
            break;
        case 6:
            $mes = "没有找到临时目录";
            break;
        case 7:
            $mes = "文件不可写";
            break;
        case 8:
            $mes = "由于PHp的扩展影响的上传";
            break;
    }
}
return  $mes;
} 
 