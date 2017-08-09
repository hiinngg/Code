<?php

use frontend\web\widgets\banner\BannerWidgets;
use yii\base\Widget;
use frontend\web\widgets\post\PostWidgets;
use frontend\web\widgets\feed\FeedWidgets;

/* @var $this yii\web\View */

$this->title = '个人博客';
?>
<div class="row">
<div class="col-lg-9">
<?php echo BannerWidgets::widget();?>
<div>
<?php echo PostWidgets::widget();?>
</div>
<div>

</div>
</div>

<div class="col-lg-3">
<?php echo FeedWidgets::widget();?>

<div>
<hr />
<a href="http://backend.com/" class="btn btn-primary " role="button">进入后台</a>
</div>
</div>


</div>

