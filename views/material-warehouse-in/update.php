<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseIn */

$this->title = 'Update Material Warehouse In: ' . $model->warehouse_id;
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->warehouse_id, 'url' => ['view', 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id, 'material_in_orderid' => $model->material_in_orderid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-warehouse-in-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
