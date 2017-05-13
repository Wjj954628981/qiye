<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchOrderlist */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单列表';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderlist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-2">
            <?= Html::a('创建订单', ['create'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" id="btndec">分解订单</button>
        </div>
    </div>
    <hr>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['id' => 'grid'],
        'columns' => [
            // ['class' => 'yii\grid\CheckBoxColumn',
            // 'checkboxOptions' => function($searchModel, $key, $index, $column) {
            //     echo '<br/><br/><br/><br/><br/>';
            //     var_dump($searchModel->order_id);
            // }],
            [
                'class' => 'yii\grid\CheckboxColumn'
            ],
            // [
            //     'attribute'=>'order_id',
            //     'format'=>'raw',
            //     'value'=> function($data){
            //         //超链接
            //         $address= "http://localhost/qiye/web/index.php?SearchOrderProduct%5Border_id%5D=$data->order_id&SearchOrderProduct%5Bproduct_id%5D=&SearchOrderProduct%5Bproduct_count%5D=&SearchOrderProduct%5Bproduct_price%5D=&r=order-product";
            //         return Html::a($data->order_id,$address, ['title' => '订单编号']);
            //     }
            // ],
            'order_id',
            'customer_id',
            'purchase_time:datetime',
            'duetime:datetime',
            'person_name',
            // 'telephone',
            // 'order_state',

            [
                'header' => "操作",
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}'
            ],
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'font-weight:bold'],
        'layout'=>"{items}\n{pager}",   
        'showOnEmpty'=>false,
    ]);
    $this->registerJs('
        console.log("in orderlist index");
        $("#btndec").click(function(){
            var keys = $("#grid").yiiGridView("getSelectedRows");
            alert(keys);
            $.post("index.php?r=OrderlistController/decompose",
            {
                keys:keys
            });
        });
    ');
    ?>
</div>
