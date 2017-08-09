<?php
use yii\bootstrap\ActiveForm;
use common\widgets\file_upload\FileUpload;
use common\widgets\ueditor\Ueditor;
use yii\helpers\Html;

$this->title='创建';
$this->params['breadcrumbs'][]=['label'=>'文章 ','url'=>['post/index']];
$this->params['breadcrumbs'][]=$this->title;
?>
<div class='row'>
<div class='col-lg-9'>
<div class='panel-title box-title'>
<span>创建文章</span>
</div>
<div class='panel-body'>
<?php $form=ActiveForm::begin();?>
<?php echo $form->field($model, 'title')->textInput(['maxlength'=>true])?>
<?php echo $form->field($model, 'cat_id')->dropDownList($cat)?>
 <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload',[
        'config'=>[
        
        ]
    ]) ?>
<?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
    'options'=>[
        'initialFrameHeight' => 400,
    ]
]) ?>
<?php echo $form->field($model, 'tags')->widget('common\widgets\tags\TagWidget')?>
<div class='form-group'>
<?php echo Html::submitButton('发布',['class'=>'btn btn-success'])  ?>
</div>
<?php ActiveForm::end()?>

</div>
</div>

<div class='col=lg-3'>
<div class='panel-title box-title'>
<span></span>
</div>
<div class='panel-body'>
<a href="http://backend.com/post/index" class="btn btn-primary " role="button">返回文章管理</a>
</div>
</div>
</div>