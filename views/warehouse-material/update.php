<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseMaterial */

$this->title = 'Update Warehouse Material: ' . $model->material_id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_id, 'url' => ['view', 'material_id' => $model->material_id, 'warehouse_id' => $model->warehouse_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
