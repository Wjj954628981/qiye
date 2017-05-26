<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use app\models\Material;
use app\models\WarehouseMaterial;
use app\models\MaterialCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWarehouse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '仓库';

$data = array();
$materials = MaterialCategory::find()->all();
foreach ($materials as $material) {
    $data['name'][] = $material['material_category_name'];
}

$warehousematerials = WarehouseMaterial::find()->all();
foreach ($warehousematerials as $warehousematerial) {
    $material_category_id = Material::find()->where(['material_id'=>$warehousematerial['material_id']])->one()['material_category_id'];
    $material_category_name = MaterialCategory::find()->where(['material_category_id'=>$material_category_id])->one()['material_category_name'];
    $data['count'][] = array('value'=>$warehousematerial['material_count'],'name'=>$material_category_name);
}

foreach($data['count'] as $v) {
  if(! isset($res[$v['name']])) $res[$v['name']] = 0;
  $res[$v['name']] += $v['value'];
}

$result = array();
foreach ($res as $key) {
    $result[] = array('value'=>$key, 'name'=>array_search($key, $res));
}

// echo "<br><br><br><br><br>";
// print_r($result);

$name = \yii\helpers\Json::htmlEncode(
     \Yii::t('app', $data['name'])
    );

$result = \yii\helpers\Json::htmlEncode(
     \Yii::t('app', $result)
    );

// $test = \yii\helpers\Json::htmlEncode(
//      \Yii::t('app', 2)
//     );
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
            <a class="text-center text-primary" data-toggle="modal" data-target="#addEmployee">
            <h1>物料信息</h1>
            </a>
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
                            'label'=>'物料名称',
                            'attribute' => 'material_name',
                            'value' => 'material.material_name'
                        ],
                        [
                            'attribute' => 'material_count',
                            'enableSorting' => false
                        ],
                        
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
                            'label'=>'产品名称',
                            'attribute' => 'product_name',
                            'value' => 'product.product_name'
                        ],
                        [
                            'attribute' => 'product_count',
                            'enableSorting' => false
                        ],
                        
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

<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="main" style="width: 560px;height:400px;"></div>
        </div>
    </div>
</div>

<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
<?php
$this->registerJs(<<<JS
    require.config({
        paths: {
            echarts: 'http://echarts.baidu.com/build/dist'
        }
    });
    require(
        [
            'echarts',
            'echarts/chart/pie'
        ],
        function (ec) {
            var myChart = ec.init(document.getElementById('main')); 
            option = {
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'horizontal',
                    left: 'left',
                    data: $name
                },
                series : [
                    {
                        name: '访问来源',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '50%'],
                        data:$result,
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
    
            myChart.setOption(option); 
        }
    );
JS
);
?>