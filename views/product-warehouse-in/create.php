<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseIn */

$this->title = 'Create Product Warehouse In';
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-in-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
