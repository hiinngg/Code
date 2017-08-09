<?php
namespace  frontend\models;

use yii;
use yii\base\Model;
use yii\db\Transaction;
use common\models\Post;
use phpDocumentor\Reflection\Types\This;
use common\models\User;
use yii\web\NotFoundHttpException;


class PostForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $cat_id;
    public $label_img;
    public $tags;
    
    public $_lastError;
    
    const SCENARIOS_CREATE='create';
    const SCENARIOS_UPLOAD='upload';
    
    const EVENT_AFTER_CREATE='eventAfterCreate';
    const EVENT_AFTER_UPDATE='eventAfterUpdate';
    
    
    public  function scenarios(){
        $scenarios=[
             self::SCENARIOS_CREATE => ['title','content','label_img','tags','cat_id'],
             self::SCENARIOS_UPLOAD => ['title','content','label_img','tags','cat_id'],
        ];
        
       return array_merge(parent::scenarios(),$scenarios);
      
    }
    public function rules(){
        
       return [
           [['id','title','content','cat_id'],'required'],
           [['id','cat_id'],'integer'],
           [['title','content'],'string','min'=>4],
       ];
    }
    
    public  function attributeLabels(){
        return [
            'id'=>'编码',
            'content'=>'内容',
            'title'=>'题目',
            'label_img'=>'标签图',
            'tags'=>'标签',
            'cat_id'=>'分类',
        ];
    }
    
    public static function getList($cond,$curPage=1,$pageSize=5,$orderBy=['id'=>SORT_DESC]){
        $model=new Post();
        $select=['id','title','summary','label_img','cat_id','user_id','user_name',
            'is_valid','created_at','updated_at'  
        ];
        $query=$model->find()
        ->select($select)
        ->where($cond)
        ->orderBy($orderBy);
        
        $res = $model->getPages($query,$curPage,$pageSize);
        //$res['data']=self::_formatList($res['data']);
        
        return $res;
    }
    
    
    
    public function create(){
        //事务
        $transaction=yii::$app->db->beginTransaction();
        try {
            $model=new  Post();
            $model->setAttributes($this->attributes);
            $model->summary=$this->_getSummary();
            $model->user_id=yii::$app->user->identity->id;
            $model->user_name=yii::$app->user->identity->username;
            $model->created_at=time();
            $model->updated_at=time();
            $model->is_valid=Post::IS_VAILD;
                if(!$model->save()){
                    throw new \Exception('文章保存失败');
                }
                $this->id=$model->id;
            
             $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            $this->_lastError=$e->getMessage();
            return false;
        }
        
    }
    
    public function getViewById($id){
       $res= Post::find()->where(['id'=>$id])->asArray()->one();
       if(!$res){
           throw new NotFoundHttpException('文章不存在！');
       }
       return $res;
    }
    
    public function  _getSummary($s=0,$e=90,$char='utf-8'){
        
        if (empty($this->content))
            return null;
        
           
         return (mb_substr(str_replace('&nbsp;','',strip_tags($this->content)),$s,$e,$char));
    }
    
    

    

    
    
}