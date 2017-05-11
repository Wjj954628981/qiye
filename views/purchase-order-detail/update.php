<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderDetail */

$this->title = 'Update Purchase Order Detail: ' . $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplier_id, 'url' => ['view', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id, 'purchase_order_id' => $model->purchase_order_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchase-order-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
