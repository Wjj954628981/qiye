<?php

use yii\helpers\Html;
use app\models\ProcessGetorderDetail;
use app\models\SearchProcessGetorderDetail;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOutOrder */

$this->title = '创建材料出库单';

$count = \yii\helpers\Json::htmlEncode(
        \Yii::t('app', $process_getorderid)
    );
// $this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Out Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;

$searchModel = new SearchProcessGetorderDetail(['process_getorderid'=>$process_getorderid]);
$dataProvider = $searchModel->search([]);
?>

<label>负责人ID:</label><input type="text" id="employee_id"><br>
<label>出库备注:</label><input type="text" id="material_outorder_remark">
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

<input type="button" class="btn btn-primary" id="add" value="确认">

<?php
$this->registerJs('
    $("#add").click(function(){
        var employee_id = $("#employee_id").val();
        var material_outorder_remark = $("#material_outorder_remark").val();
        $.post("?r=material-warehouse-out-order/add",
        {
            employee_id:employee_id,
            material_outorder_remark:material_outorder_remark,
            process_getorderid:$process_getorderid
        },
        function(data,status){
            alert(data + status);
            if(status=="success"){
                location.href="index.php?r=site/show&data="+data;
            }
        });
    });
');
?>