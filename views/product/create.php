<?php

use yii\helpers\Html;
use app\models\Material;
use app\models\Product;
use app\models\SearchMaterial;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseInOrder */
/* @var $form yii\widgets\ActiveForm */
$this->title = '新建产品';
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




<table class="table table-bordered" id="mytable">
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
		echo '<th> <input type="button" class="btn btn-primary btn-button" value="确认" id="confirm-'.$message['id'].'"> <input type="button" class="btn btn-primary btn-button" value="删除" id="delete-'.$message['id'].'"> </th>';
	?>
	</tr>
	<?php	
	}
	?>
</tbody>
</table>

<input type="text" placeholder="产品型号" id="product_id" class="form-control"><hr>
<input type="text" placeholder="产品种类型号" id="product_category_id" class="form-control"><hr>
<input type="text" placeholder="产品名称" id="product_name" class="form-control"><hr>
<input type="text" placeholder="产品价格" id="product_price" class="form-control"><hr>

<hr>
<input type="button" value="确定创建新产品" class="btn btn-primary btn-lg btn-block" id="create-inorder">
<?php
$this->registerJs(<<<JS
	$(".btn-a").click(function(e){
		var key = $(this).attr("id");
		alert(key);
		$.post("?r=product/add",
        {
            key:key
        },
        function(data, status){
        	//var msg = JSON.parse(data);
        	//$("#mytable").append("<tr><th>test</th></tr>");
        	//$("#mytable").append("<tr><th>"+data+"</th></tr>");
        });
	});

	$(".btn-button").click(function(e){
		var btn_name = $(this).attr("id");
		var key = btn_name.substring(btn_name.indexOf("-")+1, btn_name.length);
		var operator = btn_name.substring(0,btn_name.indexOf("-"));
		var num = $("#num"+key).val();
		if(operator=="confirm"){
			$.post("?r=product/confirm",
	        {
	            key:key,
	            num:num
	        },
		    function(data,status){

			});
		}else{
			alert("确定删除该记录？");
			$.post("?r=product/delete1",
	        {
	            key:key
	        });
		}
	});

	$("#create-inorder").click(function(){
		var product_id = $("#product_id").val();
		var product_category_id = $("#product_category_id").val();
		var product_name = $("#product_name").val();
		var product_price = $("#product_price").val();
		console.log(product_id + " " + product_category_id + " " + product_name+ " " + product_price);
		if(product_id==""){
			alert("请输入产品id！");
		}else if(product_category_id==""){
			alert("请输入产品种类id！");
		}else if(product_name==""){
			alert("请输入产品名称！");
		}else if(product_price==""){
 alert("请输入产品价格！");
		}
		
		if(product_id!=""&product_category_id!=""&product_name!=""&product_price!=""){
			$.post("?r=product/new",
	        {
	            product_id:product_id,
	            product_category_id:product_category_id,
	            product_name:product_name,
	            product_price:product_price
	        });
		}
	});
JS
);
?>