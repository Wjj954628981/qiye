<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseOut */

$this->title = 'Create Product Warehouse Out';
$this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-out-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
