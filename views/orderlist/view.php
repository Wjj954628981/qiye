<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SearchOrderProduct;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Orderlist */

$this->title = $model->order_id;
// $this->params['breadcrumbs'][] = ['label' => '订单列表', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderlist-view">

    <h1><?= Html::encode($this->title.'号订单') ?></h1>


    <?php
        $searchModel = new SearchOrderProduct(['order_id'=>$this->title]);
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->defaultPageSize =5;
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id',
            'customer_id',
            'purchase_time:datetime',
            'duetime:datetime',
            'person_name',
            'telephone',
            'order_state',
        ],
    ]) ?>
    
    <h1>订单详情</h1>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                // 'material_out_orderid',
                [
                    'attribute'=>'order_id',
                    'enableSorting'=>false
                ],
                [
                    'attribute' => 'product_name',
                    'value' => 'product.product_name'
                ],
                [
                    'attribute'=>'product_count',
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
