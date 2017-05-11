<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialWarehouseOutOrder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '材料出库单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-out-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建材料出库单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'material_out_orderid',
            'employee_id',
            'department_id',
            'material_out_ordertime:datetime',
            'material_out_orderstate',
            // 'material_out_orderremark',

            [
                'header' => "操作",
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}'
                // 'buttons' = [
                //     // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                //     'user-view' => function ($url, $model, $key) {
                //         $options = [
                //             'title' => Yii::t('yii', 'View'),
                //             'aria-label' => Yii::t('yii', 'View'),
                //             'data-pjax' => '0',
                //         ];
                //         return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                //     },
                //     'user-update' => function ($url, $model, $key) {
                //         $options = [
                //             'title' => Yii::t('yii', 'Update'),
                //             'aria-label' => Yii::t('yii', 'Update'),
                //             'data-pjax' => '0',
                //         ];
                //         return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                //     },
                //     'user-delete' => function ($url, $model, $key) {
                //         $options = [
                //             'title' => Yii::t('yii', 'Delete'),
                //             'aria-label' => Yii::t('yii', 'Delete'),
                //             'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                //             'data-method' => 'post',
                //             'data-pjax' => '0',
                //         ];
                //         return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                //     },
                // ]
            ],
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        'showOnEmpty'=>false,
    ]); ?>
</div>