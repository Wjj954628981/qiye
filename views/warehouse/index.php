<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;   

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWarehouse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '仓库';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-index">

    <div class="warehouse_search container">
        <?php
            $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <?= $form->field($model, 'warehouse_id')->label('仓库ID')?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <?= $form->field($model, 'item_name')->label('名称')?>
                </div>
                <div class="col-md-4">
                    <div style="height:25px;"></div>
                    <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        <?php ActiveForm::end() ?>
    </div>

    <hr>
    <div class="container">
        <h2 class="text-center text-primary">仓库信息</h2>
        <?= GridView::widget([
            'dataProvider' => $dataProviderWarehouse,
            // 'filterModel'=>$searchModelWarehouse,
            'columns' => [
                ['attribute' => 'warehouse_id',
                'enableSorting' => false],
                ['attribute' => 'warehouse_name',
                'enableSorting' => false],
                ['attribute' => 'location',
                'enableSorting' => false],
                ['attribute' => 'max',
                'enableSorting' => false],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update}{delete}',
                ],
            ],
            'emptyText'=>'当前无数据',
            'emptyTextOptions'=>['style'=>'font-weight:bold'],
            'layout'=>"{items}\n{pager}",
            'showOnEmpty'=>false,
        ]); ?>
        <hr>
        <!-- <div class="row"> -->
            <!-- <div class="col-md-6"> -->
            <h2 class="text-center text-primary">物料信息</h2>
                <?= GridView::widget([
                    'dataProvider' => $dataProviderWarehouseMaterial,
                    // 'filterModel'=>$searchModelWarehouseMaterial,
                    'columns' => [
                        // 'material_id',
                        [
                            'attribute' => 'warehouse_id',
                            'enableSorting' => false
                        ],
                        [
                            'attribute' => 'material_count',
                            'enableSorting' => false
                        ],
                        [
                            'attribute' => 'material_name',
                            'value' => 'material.material_name'
                        ]
                    ],
                    'emptyText'=>'当前无数据',
                    'emptyTextOptions'=>['style'=>'font-weight:bold'],
                    'layout'=>"{items}\n{pager}",
                    'showOnEmpty'=>false,
                ]); ?>
            <!-- </div> -->
            <hr>
            <!-- <div class="col-md-6"> -->
            <h2 class="text-center text-primary">货品信息</h2>
                <?= GridView::widget([
                    'dataProvider' => $dataProviderWarehouseProduct,
                    // 'filterModel'=>$searchModelWarehouseProduct,
                    'columns' => [
                        [
                            'attribute' => 'warehouse_id',
                            'enableSorting' => false
                        ],
                        // 'product_id',
                        [
                            'attribute' => 'product_count',
                            'enableSorting' => false
                        ],
                        [
                            'attribute' => 'product_name',
                            'value' => 'product.product_name'
                        ]
                    ],
                    'emptyText'=>'当前无数据',
                    'emptyTextOptions'=>['style'=>'font-weight:bold'],
                    'layout'=>"{items}\n{pager}",
                    'showOnEmpty'=>false,
                ]); ?>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>

