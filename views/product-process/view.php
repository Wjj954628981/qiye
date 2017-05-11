<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductProcess */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Processes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-process-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'product_id' => $model->product_id, 'process_id' => $model->process_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'product_id' => $model->product_id, 'process_id' => $model->process_id], [
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
            'process_id',
        ],
    ]) ?>

</div>
