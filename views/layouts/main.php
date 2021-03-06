<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <style type="text/css">  
        .nav > li:hover .dropdown-menu {display: block;} 
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '光电码盘管理系统',
        'brandUrl' => 'http://localhost/qiye/views/vic/material_category.php',
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
			['label' => 'Bom信息', 'icon' => 'file-code-o', 'url' => '#',
					'items' => [
							['label'=>'产品类别','icon'=>'circle-o','url'=>['/product-category'],],
							['label'=>'产品列表','icon'=>'circle-o','url'=>['/product'],],
							['label'=>'物料类别','icon'=>'circle-o','url'=>['/material-category'],],
							['label'=>'物料列表','icon'=>'circle-o','url'=>['/material'],],
							
					]
			],
            ['label'=>'我要买','url'=>['/orderlist/create']],
            ['label' => '订单列表', 'url' => ['/orderlist']],
            ['label'=>'流水线领料单','url'=>['/process-getorder','id'=>'']],
            ['label'=>'供货商','url'=>['/supplier']],
            ['label' => '仓库',
            // 'url' => ['/material-lack-order'],
            'items' => [
                            [
                                'label' => '仓库情况',
                                'url' => ['/warehouse'],
                            ],
                            [
                                'label' => '缺料单',
                                'url' => ['/material-lack-order'],
                            ],
                            [
                                'label' => '出库单',
                                'url' => ['/material-warehouse-out-order'],
                            ],
                            [
                                'label' => '入库单',
                                'url' => ['/material-warehouse-in-order'],
                            ]
                       ]
            ],
            // ['label' => '仓库情况', 'url' => ['/warehouse']],
            // ['label' => '缺料单', 'url' => ['/material-lack-order']],
            // ['label' => '出库单', 'url' => ['/material-warehouse-out-order']],
            // ['label' => '入库单', 'url' => ['/material-warehouse-in-order']],
            Yii::$app->user->isGuest ? (
                ['label' => '登录', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    '登出 (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
