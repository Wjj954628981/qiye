<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOut */

$this->title = 'Update Material Warehouse Out: ' . $model->material_out_orderid;
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_out_orderid, 'url' => ['view', 'material_out_orderid' => $model->material_out_orderid, 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-warehouse-out-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
