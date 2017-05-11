<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductMaterial */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-material-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product_id' => $model->product_id, 'material_id' => $model->material_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'product_id' => $model->product_id, 'material_id' => $model->material_id], [
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
            'product_id',
            'material_id',
        ],
    ]) ?>

</div>
