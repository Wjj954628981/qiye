<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseProduct */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id], [
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
            'warehouse_id',
            'product_count',
        ],
    ]) ?>

</div>
