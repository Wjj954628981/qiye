<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOut */

$this->title = $model->material_out_orderid;
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-out-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'material_out_orderid' => $model->material_out_orderid, 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'material_out_orderid' => $model->material_out_orderid, 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id], [
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
            'material_out_orderid',
            'warehouse_id',
            'material_id',
            'material_out_count',
        ],
    ]) ?>

</div>
