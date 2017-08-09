<?php
require_once '../lib/string.func.php';
require_once 'doAction.php';
//require_once 'uploads.php';
$fileInfo=$_FILES['myfile'];
$info=uploadFile($fileInfo);
echo $info;