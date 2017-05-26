<?php

use yii\helpers\Html;
use app\models\ProcessGetorderDetail;
use app\models\SearchProcessGetorderDetail;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOutOrder */

$this->title = '创建材料出库单';


// $this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Out Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;

$searchModel = new SearchProcessGetorderDetail(['process_getorderid'=>$process_getorderid]);
$dataProvider = $searchModel->search([]);

$process_getorderid = \yii\helpers\Json::htmlEncode(
        \Yii::t('app', $process_getorderid)
    );
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'options' => ['id' => 'grid'],
    'columns' => [
        // [
        //     'class' => 'yii\grid\CheckboxColumn'
        // ],
        [
            'attribute'=>'process_getorderid',
            'enableSorting'=>false
        ],
        'material.material_name',
        [   
            'attribute'=>'material_count',
            'enableSorting'=>false
        ],
        
    ],
    'emptyText'=>'当前无数据',
    'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
    'layout'=>"{items}\n{pager}",
    'showOnEmpty'=>false,
]); ?>
<input type="text" placeholder="负责人ID" id="employee_id" class="form-control"><br>
<textarea class="form-control" placeholder="备注区域" id="material_outorder_remark"></textarea>
<hr>
<input type="button" value="确认" class="btn btn-primary btn-lg btn-block" id="add">

<?php

$this->registerJs(<<<JS
   $("#add").click(function(){
        var employee_id = $("#employee_id").val();
        var material_outorder_remark = $("#material_outorder_remark").val();
        var process_getorderid = $process_getorderid;
        console.log(employee_id+material_outorder_remark);
        $.post("?r=material-warehouse-out-order/add",
        {
            employee_id:employee_id,
            material_outorder_remark:material_outorder_remark,
            process_getorderid:process_getorderid
        },
        function(data, status){
            alert(status);
        });
        //window.location="index.php?r=material-warehouse-out-order/add&process_getorderid="+process_getorderid+"&employee_id="+employee_id+"&material_outorder_remark="+material_outorder_remark;
    
    });
JS
);
?>