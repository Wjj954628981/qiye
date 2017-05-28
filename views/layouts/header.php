<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . '光电码盘生产管理系统' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                Yii::$app->user->isGuest ? (
                    ['label' => '登录', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        '登出 (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-primary logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )]
            ]);
        ?>
        </div>
    </nav>
</header>
