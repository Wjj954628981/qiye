<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseInOrder */

$this->title = '修改材料入库单: ' . $model->material_in_orderid;
// $this->params['breadcrumbs'][] = ['label' => 'Material Warehouse In Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->material_in_orderid, 'url' => ['view', 'id' => $model->material_in_orderid]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-warehouse-in-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
