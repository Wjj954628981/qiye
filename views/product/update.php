<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = '修改产品信息' .'-'. $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'id' => $model->product_id]];
$this->params['breadcrumbs'][] = '确认修改';
?>
<br>
<div class="product-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
