<?php
//��������ַ���
function buildRandomString($type=1,$length=4){
 if($type==1){
   $chars=join("",range(0, 9));  
 } elseif ($type==2) {
    $chars=join("", array_merge(range("a", "z"),range("A", "Z")));
 }elseif ($type==3){
     $chars=join("", array_merge(range("a", "z"),range("A", "Z"),range("0", "9")));
     
 }
 if($length>strlen($chars)){
     exit("�ַ������Ȳ���");
 }
 $chars=str_shuffle($chars);
 return substr($chars,0,$length);
    
}

function getUnitName(){
    return md5(uniqid(microtime(true),true));
}

function getExt($filename){
    $array=explode(".", $filename);
    
    $str=end($array);
    
    $extstr=strtolower($str);
    
    return $extstr;
    
}
?>