<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductProcess */

$this->title = 'Update Product Process: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Processes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'process_id' => $model->process_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-process-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
