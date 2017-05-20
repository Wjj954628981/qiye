<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialWarehouseInOrder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '材料入库单';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-in-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建材料入库单', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProviderMaterialWarehouseInOrder,
        'filterModel' => $searchModelMaterialWarehouseInOrder,
        'columns' => [
            'material_in_orderid',
            'employee_id',
            'material_in_ordertime:datetime',
            // 'material_in_orderremark',

            [
                'header' => "操作",
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ]
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        'showOnEmpty'=>false,
    ]); ?>
</div>

<div class="product-warehouse-in-order-index">

    <h1>产品入库单</h1>
    <p>
        <?= Html::a('创建产品入库单', ['product-warehouse-in-order/create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProviderProductWarehouseInOrder,
        'filterModel' => $searchModelProductWarehouseInOrder,
        'columns' => [
            'product_in_orderid',
            'employee_id',
            'product_in_ordertime:datetime',
            'product_in_orderremark',

            [
                'header' => "操作",
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    switch($action)
                    {
                        case 'view':
                            return 'index.php?r=product-warehouse-in-order%2Fview&id=' . $model->product_in_orderid;
                            break;
                        // case 'update':
                        //     return 'index.php?r=product-warehouse-in-order%2Fupdate&id=' . $model->product_in_orderid;
                        //     break;
                    }

                },
            ],
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        'showOnEmpty'=>false,
    ]); ?>
</div>