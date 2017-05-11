<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseInOrder */

$this->title = 'Create Product Warehouse In Order';
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse In Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-in-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
