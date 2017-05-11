<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseIn */

$this->title = $model->warehouse_id;
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-in-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id, 'material_in_orderid' => $model->material_in_orderid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id, 'material_in_orderid' => $model->material_in_orderid], [
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
            'warehouse_id',
            'material_id',
            'material_in_orderid',
            'material_in_count',
        ],
    ]) ?>

</div>
