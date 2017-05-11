<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialSupplier */

$this->title = $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Material Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-supplier-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id], [
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
            'supplier_id',
            'material_id',
        ],
    ]) ?>

</div>
