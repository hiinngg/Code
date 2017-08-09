<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\web\widgets\sidebar\SidebarWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <div class="headerpanel">
        <div class="logopanel">
            <h2><a href="#">博客管理系统</a></h2>
        </div><!-- logopanel -->
        
        <div class="headerbar">
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

            <div class="searchpanel">
           
            </div>

            <div class="header-right">
                <ul class="headermenu">
              
                        <div class="btn-group">
                            <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <img src="<?=Yii::$app->params['avatar']['small'] ?>" alt="头像">
                                <?=Yii::$app->user->identity->username?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                
                                <li><a href="<?=Url::to(['site/logout'])?>" data-method="post" ><i class="fa fa-sign-out"></i> 退出</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div><!-- header-right -->
        </div><!-- headerbar -->
    </div><!-- header-->
</header>

<section>

<div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->

    <div class="media leftpanel-profile">
        <div class="media-left">
            <a href="#">
                <img src="<?=Yii::$app->params['avatar']['small']?>" alt="" class="media-object img-circle">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?=Yii::$app->user->identity->username?><a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
            <span>管理员</span>
        </div>
    </div><!-- leftpanel-profile -->

    <div class="leftpanel-userinfo collapse" id="loguserinfo">
        <h5 class="sidebar-title">地址</h5>
        <address>浙江省杭州市滨江区</address>
        <h5 class="sidebar-title">联系方式</h5>
        <ul class="list-group">
            <li class="list-group-item">
                <label class="pull-left">邮箱</label>
                <span class="pull-right">me@themepixels.com</span>
            </li>
            <li class="list-group-item">
                <label class="pull-left">电话</label>
                <span class="pull-right">(032) 1234 567</span>
            </li>
            <li class="list-group-item">
                <label class="pull-left">手机</label>
                <span class="pull-right">+63012 3456 789</span>
            </li>
            <li class="list-group-item">
                <label class="pull-left">第三方</label>
                <div class="social-icons pull-right">
                    <a href="#"><i class="fa fa-facebook-official"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </li>
        </ul>
    </div><!-- leftpanel-userinfo -->
    <div class="tab-content">
    
        <div class="tab-pane active" id="mainmenu">
            <h5 class="sidebar-title">菜单</h5>
            <!-- sidebar组件 -->
            <?=SidebarWidget::widget([
                'encodeLabels' => false,
            ])?>
        </div>
    </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
</div><!-- leftpanel -->

  <div class="mainpanel">
    <div class="contentpanel">
        <?= Breadcrumbs::widget([
            'homeLink'=>[
                'label' => '<i class="fa fa-home mr5"></i> '.Yii::t('yii', 'Home'),
                'url' => '/',
                'encode' => false,
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'tag'=>'ol',
            'options' => ['class' => 'breadcrumb breadcrumb-quirk']
        ]) ?>                
        <hr class="darken"> 
        <?= Alert::widget() ?>       
        <?=$content?>
    </div>
    
  </div><!-- mainpanel -->

</section>

<?php Modal::begin([    
    'id' => 'create-modal',    
    'header' => '<h4 class="modal-title"></h4>',    
]); 
Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
