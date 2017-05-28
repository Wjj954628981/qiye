<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\SearchProductMaterial;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->product_name;
// $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">


    <?php
        $searchModel = new SearchProductMaterial(['product_id'=>$this->title]);
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->defaultPageSize =5;
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'product_category_id',
            'product_name',
            'product_price',
        ],
    ]) ?>

    <h1>货品详情</h1>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                // 'material_out_orderid',
             
                [
                    'attribute' => 'material_id',
                	'value'=>'material.material_name',
                    'enableSorting'=>false,
                	'label'=>'物料名称'
                   // 'label' => '材料名称',
                    //'value' => 'material.material_name'
                ],
                [
                    'attribute'=>'num_material',
                    'enableSorting'=>false,
                	'label'=>'数量',
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
        window.location = "?r=product/index"
    });
JS
);
?>