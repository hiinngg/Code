<?php

use yii\helpers\Html;
use phpDocumentor\Reflection\Types\This;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Create Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=// $this->render('_form', [
        //'model' => $model,
  //  ])
    'http://frontend.com'.Url::to('post/create')
   ?>

</div>
