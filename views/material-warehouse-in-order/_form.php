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
    $count = \yii\helpers\Json::htmlEncode(
    	\Yii::t('app', $dataProvider->getCount())
	);
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
                        'id' => 'btn'.$key,
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
	<!-- <form id="add_MaterialWarehouseInOrder" action="?r=material-warehouse-in-order/create">
		<div class="row">
			<div class="col-md-1">
				<label class="form-label">负责人</label>
			</div>
			<div class="col-md-3">
				<input class="form-control" type="text" id="employee_id">
			</div>

			<div class="col-md-1">
				<label class="form-label">订单备注</label>
			</div>
			<div class="col-md-3">
				<input class="form-control" type="text" id="MaterialWarehouseInOrderRemark">
			</div>
		</div>

	</form> -->

</div>

<?php
$this->registerJs(<<<JS
	$("#btn0").click(function(){
		alert($count);
	});
JS
);
?>