<?php

use yii\helpers\Html;
use app\models\Material;
use app\models\SearchMaterial;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseInOrder */
/* @var $form yii\widgets\ActiveForm */
?>
	
<?php
	$searchModel = new SearchMaterial();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->Pagination->defaultPageSize = 5;
 //    $count = \yii\helpers\Json::htmlEncode(
 //    	\Yii::t('app', $dataProvider->getCount())
	// );
    $count = Material::find()->count();
	$cookies = Yii::$app->request->cookies;

	$messages = array();
	for($i=0;$i<$count;$i++){
		if(($item = $cookies->get('message'.$i))!=NULL){
			$messages[] = array('id'=>$i,'num'=>$item);
		}
	}
	// $language = $cookies->get('message0');
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
        	'attribute'=>'material_id',
        	'enableSorting'=>false
        ],
        [
        	'attribute'=>'material_category_id',
        	'enableSorting'=>false
        ],
        [
        	'attribute'=>'material_name',
        	'enableSorting'=>false
        ],
        [
            'header' => "操作",
            'class' => 'yii\grid\ActionColumn',
            'template' => '{add}',
            'buttons'=>[
            	'add'=>function($url, $model, $key){
            		$options = [
                    'title' => Yii::t('yii', 'Add'),
                    'aria-label' => Yii::t('yii', 'Add'),
                    'data-pjax' => '0',
                    'id' => $key,
                    'class' => 'btn-a',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', "", $options);
   	         	}
            ]
        ]	
    ],
    'emptyText'=>'当前无数据',
    'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
    'layout'=>"{items}\n{pager}",
    'showOnEmpty'=>false,
]); ?>




<table class="table table-bordered">
<thead>
	<tr>
		<th>材料名称</th>
		<th>数量</th>
		<th>操作</th>
	</tr>
</thead>
<tbody>
	<?php
	if(count($messages)==0){
		echo '<tr><th>当前无数据</th></tr>';
	}
	foreach ($messages as $message) {
	?>
	<tr>
	<?php
		echo '<th>'.Material::find()->where(['material_id'=>$message['id']])->one()['material_name'].'</th>';
		echo '<th><input type="text" value="'.(string)$message['num'].'" id="num'.$message['id'].'"></th>';
		// echo '<th>'.$message['num'].'</th>';
		echo '<th> <input type="button" class="btn btn-primary btn-button" value="确认" id="confirm-'.$message['id'].'"> <input type="button" class="btn btn-primary btn-button" value="删除" id="delete-'.$message['id'].'"> </th>';
	?>
	</tr>
	<?php	
	}
	?>
</tbody>
</table>

<label>负责人ID：</label>
<input type="text" id="employee_id">
<hr>
<label>仓库ID：</label>
<input type="text" id="warehouse_id">
<hr>

<textarea class="form-control" placeholder="备注区域" id="remark"></textarea>
<hr>
<input type="button" value="确定创建入库单" class="btn btn-primary btn-lg btn-block" id="create-inorder">
<?php
$this->registerJs(<<<JS
	$(".btn-a").click(function(e){
		var key = $(this).attr("id");
		$.post("?r=material-warehouse-in-order/add",
        {
            key:key
        });
	});

	$(".btn-button").click(function(e){
		var btn_name = $(this).attr("id");
		var key = btn_name.substring(btn_name.indexOf("-")+1, btn_name.length);
		var operator = btn_name.substring(0,btn_name.indexOf("-"));
		var num = $("#num"+key).val();
		if(operator=="confirm"){
			$.post("?r=material-warehouse-in-order/confirm",
	        {
	            key:key,
	            num:num
	        });
		}else{
			alert("确定删除该记录？");
			$.post("?r=material-warehouse-in-order/delete",
	        {
	            key:key
	        });
		}
	});

	$("#create-inorder").click(function(){
		var employee_id = $("#employee_id").val();
		var remark = $("#remark").val();
		var warehouse_id = $("#warehouse_id").val();
		console.log(employee_id + " " + remark + " " + warehouse_id);
		if(employee_id==""){
			alert("请输入负责人id！");
		}else if(warehouse_id==""){
			alert("请输入仓库id！");
		}else if(remark==""){
			remark="无备注";
		}
		
		if(employee_id!=""&warehouse_id!=""){
			$.post("?r=material-warehouse-in-order/new",
	        {
	            employee_id:employee_id,
	            remark:remark,
	            warehouse_id:warehouse_id
	        });
		}
	});
JS
);
?>