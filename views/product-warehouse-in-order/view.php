<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseInOrder */

$this->title = $model->product_in_orderid;
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse In Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-in-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_in_orderid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_in_orderid], [
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
            'product_in_orderid',
            'employee_id',
            'product_in_ordertime:datetime',
            'product_in_orderremark',
        ],
    ]) ?>

</div>
