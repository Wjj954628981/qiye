<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductMaterial */

$this->title = 'Update Product Material: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'material_id' => $model->material_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
