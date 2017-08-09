<?php
namespace  frontend\web\widgets\post;

use yii;
use yii\base\Widget;
use common\models\Post;
use frontend\models\PostForm;
use yii\helpers\Url;
use yii\data\Pagination;

class PostWidgets extends Widget
{
    
 
    public $title='';
    
    
    public $limit=3;
    
    
    public $more=true;
    
 
    public $page=TRUE;
    
    public function run()
    {
        $curPage=yii::$app->request->get('page',1);
        
        
        $cond=['=','is_valid',Post::IS_VAILD];;
        $res=PostForm::getList($cond,$curPage,$this->limit);
        $result['title']=$this->title?:'最新文章';
        $result['more']=Url::to(['post/index']);
        $result['body']=$res['data']?:[];
        if($this->page){
            $pages=new Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $result['page']=$pages;
        }
        return $this->render('index',['data'=>$result]);
    }
}