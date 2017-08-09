<?php

function buildRandomString($type=1,$length=4){
    if($type==1){
        $chars=join("",range(0, 9));
    } elseif ($type==2) {
        $chars=join("", array_merge(range("a", "z"),range("A", "Z")));
    }elseif ($type==3){
        $chars=join("", array_merge(range("a", "z"),range("A", "Z"),range("0", "9")));
         
    }
    if($length>strlen($chars)){
        exit("字符串长度不够");
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



function verifyImage($type=1,$length=4,$pixel=0,$line=0){
    
  
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    // 用填充矩形填充画布
    imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
    $chars= buildRandomString($type,$length); // 创建字符串
   
   
     $fontfiles = array(
        "PALA.TTF"
    ); 
    //逐个数字输出
    for($i =0;$i<4;$i++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(-15, 15);
        $x =5+$i*$size;
        $y = mt_rand(20, 26);
        $fontfile = "../../fonts/" . $fontfiles[0];
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars,$i,1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
  /*   $pixel=0;
    if($pixel){
        for($i=0;$i<$pixel;$i++){
            imagesetpixel($image, mt_rand(0,$width-1), mt_rand(0,$height-1), $black);
        }
    }
    $line=0;
    if($line){
        for($i=1;$i<$line;$i++){
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0,$width-1), mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1), $color);
        }
    } */
  
    Header ( "content-type:image/gif" );
    ob_clean();
    imagegif ( $image );
    imagedestroy ( $image );
}