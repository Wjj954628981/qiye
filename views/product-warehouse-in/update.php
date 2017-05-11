<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseIn */

$this->title = 'Update Product Warehouse In: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'product_in_orderid' => $model->product_in_orderid, 'warehouse_id' => $model->warehouse_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-warehouse-in-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
