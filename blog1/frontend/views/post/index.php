<?php


use yii\base\Widget;
use frontend\web\widgets\post\PostWidgets;
use frontend\models\FeedForm;
use frontend\web\widgets\feed\FeedWidgets;


?>
<div class='row'>

<div class='col-lg-9'>
<?php echo PostWidgets::widget()?>
</div>

<div  class='col-lg-3'>
 <?php echo  FeedWidgets::widget();?>
</div>
</div>