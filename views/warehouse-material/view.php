<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseMaterial */

$this->title = $model->material_id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-material-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'material_id' => $model->material_id, 'warehouse_id' => $model->warehouse_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'material_id' => $model->material_id, 'warehouse_id' => $model->warehouse_id], [
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
            'material_id',
            'warehouse_id',
            'material_count',
        ],
    ]) ?>

</div>
