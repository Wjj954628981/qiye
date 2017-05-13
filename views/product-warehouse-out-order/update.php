<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseOutOrder */

$this->title = '修改产品出库单: ' . $model->product_out_orderid;
// $this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Out Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->product_out_orderid, 'url' => ['view', 'id' => $model->product_out_orderid]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-warehouse-out-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
