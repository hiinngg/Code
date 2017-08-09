<?php
namespace  frontend\web\widgets\banner;

use yii;
use yii\bootstrap\Widget;

class BannerWidgets extends Widget
{
    public $items=[];
    public function init(){
        if(empty($this->items)){
            $this->items=[
              [
                  'label'=>'1',
                  'image_url'=>'/static/images/banner/b_01.jpg',
                  'url'=>['site/index'],
                  'html'=>"",
                  'active'=>'active',
                  
              ],
                [
                'label'=>'2',
                'image_url'=>'/static/images/banner/b_02.jpg',
                'url'=>['site/index'],
                'html'=>"",
                'active'=>'',
                
                ],
                [
                'label'=>'3',
                'image_url'=>'/static/images/banner/b_03.jpg',
                'url'=>['site/index'],
                'html'=>"",
                 'active'=>'',
                
                ],
                
                
            ];
        }
    }
    public function run(){
        $data['item']=$this->items;
      return   $this->render('index',['data'=>$data['item']]);
    }
}

