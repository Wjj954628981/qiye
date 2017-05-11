<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategoryKey */

$this->title = 'Update Product Category Key: ' . $model->product_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Category Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_category_id, 'url' => ['view', 'product_category_id' => $model->product_category_id, 'pro_product_category_id' => $model->pro_product_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-category-key-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
