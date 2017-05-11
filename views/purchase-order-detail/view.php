<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderDetail */

$this->title = $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id, 'purchase_order_id' => $model->purchase_order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id, 'purchase_order_id' => $model->purchase_order_id], [
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
            'supplier_id',
            'material_id',
            'purchase_order_id',
            'material_count',
        ],
    ]) ?>

</div>
