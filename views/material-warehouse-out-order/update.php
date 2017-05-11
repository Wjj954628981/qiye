<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOutOrder */

$this->title = 'Update Material Warehouse Out Order: ' . $model->material_out_orderid;
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Out Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_out_orderid, 'url' => ['view', 'id' => $model->material_out_orderid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-warehouse-out-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
