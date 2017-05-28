<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductCategory */

$this->title = '创建一个新的产品类别';
$this->params['breadcrumbs'][] = ['label' => '产品类别目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
