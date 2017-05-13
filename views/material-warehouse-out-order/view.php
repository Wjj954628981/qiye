<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SearchMaterialWarehouseOut;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOutOrder */

$this->title = $model->material_out_orderid;
// $this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Out Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-out-order-view">

    <h1><?= Html::encode($this->title.'号出库单') ?></h1>

    <?php
        $searchModel = new SearchMaterialWarehouseOut(['material_out_orderid'=>$this->title]);
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->defaultPageSize =5;
    ?>
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

    <h1>出库单详情</h1>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                // 'material_out_orderid',
                [
                    'attribute'=>'warehouse_id',
                    'enableSorting'=>false
                ],
                [
                    'attribute' => 'material_name',
                    'label' => '材料名称',
                    'value' => 'material.material_name'
                ],
                [
                    'attribute'=>'material_out_count',
                    'enableSorting'=>false
                ]
                // [
                //     'header' => "操作",
                //     'class' => 'yii\grid\ActionColumn'
                // ],
            ],
            'emptyText'=>'当前无数据',
            'emptyTextOptions'=>['style'=>'font-weight:bold'],
            'layout'=>"{items}\n{pager}",
            'showOnEmpty'=>false,
        ]); ?>

</div>
