<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialWarehouseOut */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '缺料单';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-lack-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => '货物名称',
                    'value' => 'material.material_name'
                ],
                [
                    'attribute' => 'material_count',
                    'label' => '库存数量',
                    'enableSorting' => false
                ],
                [
                    'attribute' => '最小数量',
                    'value' => 'material.material_min'
                ],
            ],
            'emptyText'=>'当前无数据',
            'emptyTextOptions'=>['style'=>'font-weight:bold'],
            'layout'=>"{items}\n{pager}",
            'showOnEmpty'=>false,
        ]); ?>
    </div>
</div>
