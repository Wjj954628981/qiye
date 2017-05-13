<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SearchProductWarehouseOut;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseOutOrder */

$this->title = $model->product_out_orderid;
// $this->params['breadcrumbs'][] = ['label' => 'Product Warehouse Out Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-out-order-view">

    <h1><?= Html::encode($this->title.'号出库单') ?></h1>


    <?php
        $searchModel = new SearchProductWarehouseOut(['product_out_orderid'=>$this->title]);
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->defaultPageSize =5;
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_out_orderid',
            'employee_id',
            'product_out_ordertime:datetime',
            'product_out_orderremark',
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
                'attribute' => 'product_name',
                'label' => '产品名称',
                'value' => 'product.product_name'
            ],
            [
                'attribute'=>'product_out_count',
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
