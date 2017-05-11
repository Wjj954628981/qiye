<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseOut */

$this->title = 'Update Product Warehouse Out: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id, 'product_out_orderid' => $model->product_out_orderid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-warehouse-out-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
