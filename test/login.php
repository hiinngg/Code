<?php

$code=$_GET['code'];
$appid="wx01d5fbba4b45ff45";
$secret="97c93322d2c697921b6bc74c5fda2347";
$url="https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
function httpGet($url) {  
    $curl = curl_init();  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,true);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,true);  
    curl_setopt($curl, CURLOPT_URL, $url);      
    $res = curl_exec($curl);  
    curl_close($curl);  
  
    return $res;  
  }  

$res=httpGet($url);
header('Content-type: application/text');
echo $res;



?>