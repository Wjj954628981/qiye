<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOutOrder */

$this->title = $model->material_out_orderid;
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Out Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-out-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->material_out_orderid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->material_out_orderid], [
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
            'material_out_orderid',
            'employee_id',
            'department_id',
            'material_out_ordertime:datetime',
            'material_out_orderstate',
            'material_out_orderremark',
        ],
    ]) ?>

</div>
