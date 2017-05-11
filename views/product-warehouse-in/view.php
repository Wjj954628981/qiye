<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseIn */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-in-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product_id' => $model->product_id, 'product_in_orderid' => $model->product_in_orderid, 'warehouse_id' => $model->warehouse_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'product_id' => $model->product_id, 'product_in_orderid' => $model->product_in_orderid, 'warehouse_id' => $model->warehouse_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'product_in_orderid',
            'warehouse_id',
            'product_in_count',
        ],
    ]) ?>

</div>
