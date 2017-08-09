<?php
namespace  frontend\models;

use yii\base\Model;
use common\models\Feeds;
use common\models\User;

class FeedForm extends Model{
    public $id;
    public $user_id;
    public $content;
    public $created_at;
    public $last_error;
    
    
  public  function  rules(){
      
     return [
         [['content'],'required'],
         [['content'],'string','max'=>255],
     ];
  }
  public function attributeLabels(){
      return [
          'user_id'=>'用户名',
          'content'=>'内容',
          'created_at'=>'创建时间'
          
      ];
  }
  
  public function getList(){
      $model=new Feeds();
      $res=$model->find()->limit(10)->orderBy(['id'=>SORT_DESC])->asArray()->all();
      return $res?:[];
  }
  
  public function create(){
      try {
          $model=new Feeds();
          $model->user_id=\yii::$app->user->identity->id;
          $model->content=$this->content;
          $model->created_at=time();
          if($model->save()){
              return true;
          }else {throw new \Exception('保存失败！');}
          
          
          
      }catch (\Exception $e){
          $this->last_error=$e->getMessage();
          return false;
      }
  }
    
}