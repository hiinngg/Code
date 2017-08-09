<?php
namespace frontend\web\widgets\feed;

use yii\base\Widget;
use frontend\models\FeedForm;

class FeedWidgets extends Widget
{
  public function run(){
      $model=new FeedForm();
      $data['feed']=$model->getList();
      return  $this->render('index',['data'=>$data]);
    
  } 
}