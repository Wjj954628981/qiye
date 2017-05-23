<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SearchMaterialWarehouseIn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseInOrder */

$this->title = $model->material_in_orderid;
// $this->params['breadcrumbs'][] = ['label' => 'Material Warehouse In Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-in-order-view">

    <h1><?= Html::encode($this->title.'号入库单') ?></h1>

    <?php
        $searchModel = new SearchMaterialWarehouseIn(['material_in_orderid'=>$this->title]);
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->defaultPageSize =5;
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'material_in_orderid',
            'employee_id',
            'material_in_ordertime:datetime',
            'material_in_orderremark',
        ],
    ]) ?>

    <h1>入库单详情</h1>
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
                    'attribute'=>'material_in_count',
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
<input type="button" value="返回" class="btn btn-primary btn-lg btn-block" id="backtoindex">

</div>
<?php
$this->registerJs(<<<JS
    $("#backtoindex").click(function(e){
        window.location = "?r=material-warehouse-in-order/index"
    });
JS
);
?>