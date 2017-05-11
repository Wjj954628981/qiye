<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategoryKey */

$this->title = $model->product_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Category Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-key-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product_category_id' => $model->product_category_id, 'pro_product_category_id' => $model->pro_product_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'product_category_id' => $model->product_category_id, 'pro_product_category_id' => $model->pro_product_category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_category_id',
            'pro_product_category_id',
        ],
    ]) ?>

</div>
