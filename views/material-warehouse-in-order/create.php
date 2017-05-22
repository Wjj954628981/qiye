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

<div class="material-warehouse-in-order-form">

	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'material_id',
            'material_category_id',
            'material_name',
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
</div>



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
	foreach ($messages as $message) {
	?>
	<tr>
	<?php
		echo '<th>'.$message['id'].'</th>';
		echo '<th><input type="text" value="'.$message['num'].'"></th>';
		echo '<th> <input type="button" class="btn btn-primary" value="确认" id="confirm-'.$message['id'].'"> <input type="button" class="btn btn-primary" value="删除" id="delete-'.$message['id'].'"> </th>';
	?>
	</tr>
	<?php	
	}
	?>
</tbody>

</table>

<?php
$this->registerJs(<<<JS
	$(".btn-a").click(function(e){
		var key = $(this).attr("id");
		$.post("?r=material-warehouse-in-order/add",
        {
            key:key
        });
	});

	$(".btn").click(function(e){
		var key = $(this).attr("id").substring();
	});
JS
);
?>