<?php
use frontend\web\widgets\feed\FeedWidgets;
use yii\base\Widget;
use frontend\models\FeedForm;


$this->title=$data['title'];
$this->params['breadcrumbs'][]=['label'=>'文章','url'=>['post/index']];
$this->params['breadcrumbs'][]=$this->title;
?>

<div class='row'>
  <div class="col-lg-9">
      <div class='page-title'>
          <h1><?= $data['title']?></h1>
          <span>作者:<?php echo $data['user_name'];?>   </span>
          <span>发布: <?php echo date('Y-m-d',$data['created_at']) ;?>    </span>
      
      </div>
      <?php echo $data['content']?>
   </div>
  <div  class='col-lg-3'>

  </div>
</div>