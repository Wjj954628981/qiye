<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseOutOrder */

$this->title = '创建产品出库单';
// $this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Out Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-out-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
