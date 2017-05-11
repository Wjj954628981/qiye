<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseInOrder */

$this->title = 'Update Product Warehouse In Order: ' . $model->product_in_orderid;
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse In Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_in_orderid, 'url' => ['view', 'id' => $model->product_in_orderid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-warehouse-in-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
