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
       
    </div>
    <hr>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['id' => 'grid'],
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn'
            ],
             'order_state',
             [
                 'attribute'=>'order_id',
                 'format'=>'raw',
                 // 'value'=> function($data){
                 //     //超链接
                 //     $address= "http://localhost/qiye/web/index.php?SearchOrderProduct%5Border_id%5D=$data->order_id&SearchOrderProduct%5Bproduct_id%5D=&SearchOrderProduct%5Bproduct_count%5D=&SearchOrderProduct%5Bproduct_price%5D=&r=order-product";
                 //     return Html::a($data->order_id,$address, ['title' => '订单编号']);
                 // }
             ],
            //'order_id',
            // [
            //     'attribute'=>'顾客姓名',
            //     'value'=>'customer.customer_name'
            // ],
            'customer_id',
            'purchase_time:datetime',
            'duetime:datetime',
            'person_name',
            'telephone',
           
            [
                'header' => "操作",
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'font-weight:bold'],
        'layout'=>"{items}\n{pager}",   
        'showOnEmpty'=>false,
    ]);?>
    <input type="button" value="分解订单" class="btn btn-primary btn-lg btn-block" id="btndec">

    <?php
    $this->registerJs('
        console.log("in orderlist index");
        $("#btndec").click(function(){
            var keys = $("#grid").yiiGridView("getSelectedRows");
            //alert(keys);
            $.post("?r=orderlist/decompose",
            {
                keys:keys
            },
            function(data, status){
                //alert(data+status);
            });
        });
    ');
    ?>
</div>