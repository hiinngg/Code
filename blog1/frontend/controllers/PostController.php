<?php
namespace  frontend\controllers;

use yii;
use frontend\controllers\base\BaseController;
use frontend\models\PostForm;
use common\models\Cat;

class PostController extends BaseController
{
    public function actionIndex(){
   
        
        return $this->render('index');
        
  }
  
  
  public function actions()
  {
      return [
          'upload'=>[
              'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
              'config' => [
                  'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
              ]
          ],
          
          'ueditor'=>[
              'class' => 'common\widgets\ueditor\UeditorAction',
              'config'=>[
                  //上传图片配置
                  'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                  'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
              ]
          ]
      ];
  }
  public function actionCreate(){
      
      $model=new PostForm();
      $model->setScenario(PostForm::SCENARIOS_CREATE);
      if($model->load(yii::$app->request->post())&&$model->validate()){
          if(!$model->create()){
         //yii::$app->session->setFlash('warning',$model->_lastError);
        
             throw  new \Exception('出错啦');
      }else {
          return $this->redirect(['post/view','id'=>$model->id]);
      }
      }
      $cat=Cat::getallcats();
      return $this->render('create',['model'=>$model,'cat'=>$cat]);
  }
  
  public function actionView($id){
      
      $model=new PostForm();
      $data=$model->getViewById($id);
      
      return $this->render('view',['data'=>$data]);
      
      
      
  }
  
  
}