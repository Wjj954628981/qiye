<?php

use yii\helpers\Html;
use app\models\Product;
use app\models\SearchProduct;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseInOrder */

$this->title = '创建订单';
// $this->params['breadcrumbs'][] = ['label' => 'Material Warehouse In Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>

<?php
	$searchModel  = new SearchProduct();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->Pagination->defaultPageSize = 5;
 //    $count = \yii\helpers\Json::htmlEncode(
 //    	\Yii::t('app', $dataProvider->getCount())
	// );
    $count = Product::find()->count();
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
        	'attribute'=>'product_id',
        	'enableSorting'=>false
        ],
        [
        	'attribute'=>'product_category_id',
        	'enableSorting'=>false
        ],
        [
        	'attribute'=>'product_name',
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
		<th>货品名称</th>
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
		echo '<th>'.Product::find()->where(['product_id'=>$message['id']])->one()['product_name'].'</th>';
		echo '<th><input type="text" value="'.$message['num'].'" id="num'.$message['id'].'"></th>';
		echo '<th> <input type="button" class="btn btn-primary btn-button" value="确认" id="confirm-'.$message['id'].'"> <input type="button" class="btn btn-primary btn-button" value="删除" id="delete-'.$message['id'].'"> </th>';
	?>
	</tr>
	<?php	
	}
	?>
</tbody>
</table>

<input type="text" placeholder="下单人员" id="employee_id" class="form-control">
<hr>
<input type="text" placeholder="交货时间" id="employee_id" class="form-control">
<hr>
<input type="text" placeholder="顾客ID" id="employee_id" class="form-control">
<hr>
<input type="text" placeholder="联系方式" id="employee_id" class="form-control">
<hr>



<input type="button" value="提交订单" class="btn btn-primary btn-lg btn-block" id="create-inorder">

<!-- <div class="material-warehouse-in-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div> -->
<?php
$this->registerJs(<<<JS
    $(".btn-a").click(function(e){
        var key = $(this).attr("id");
        $.post("?r=orderlist/add",
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
            $.post("?r=orderlist/confirm",
            {
                key:key,
                num:num
            });
        }else{
            alert("确定删除该记录？");
            $.post("?r=orderlist/deletes",
            {
                key:key
            });
        }
    });

    $("#create-inorder").click(function(){
        var duetime = $("#duetime").val();
        var customer_id = $("#customer_id").val();
        var telephone = $("#telephone").val();
       
        var person_name = $("#person_name").val();
        console.log(duetime + " " + customer_id + " " + telephone);
        if(duetime==""){
            alert("请输入截止时间！");
        }else if(customer_id==""){
            alert("请输入顾客ID！");
        }else if(telephone==""){
            telephone="请输入联系方式！";
        }else if(person_name==""){
            person_name="请输入下单人名！";
        }
        
        if(customer_id!=""){
            $.post("?r=orderlist/new",
            {
                duetime:duetime,
                customer_id:customer_id,
                telephone:telephone,
                person_name:person_name
            });
        }
    });
JS
);
?>