<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseProduct */

$this->title = 'Update Warehouse Product: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
