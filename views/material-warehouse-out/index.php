<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialWarehouseOut */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '材料出库清单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-out-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建材料出库清单', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
        <div class="col-md-8">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'material_out_orderid',
                'warehouse_id',
                'material_id',
                'material_out_count',
                [
                    'header' => "操作",
                    'class' => 'yii\grid\ActionColumn'
                ],
            ],
            'emptyText'=>'当前无数据',
            'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
            'layout'=>"{items}\n{pager}",
            'showOnEmpty'=>false,
        ]); ?>
        </div>
        <div class="col-md-4">
            <p>
                Test
            </p>
        </div>
    </div>
</div>
