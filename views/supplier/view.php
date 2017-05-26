<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = $model->supplier_id;
// $this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-view">

    <h1><?= Html::encode($this->title.'号供应商') ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'supplier_id',
            'company_name',
            'address',
            'telephone',
        ],
    ]) ?>

    <h1>供应的货物</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'supplier_id',
                'enableSorting'=>false,
            ],
            [
                'attribute'=>'材料名称',
                'value'=>'material.material_name',
                'enableSorting'=>false
            ]
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        'showOnEmpty'=>false,
    ]); ?>

    <input type="button" value="返回" class="btn btn-primary btn-lg btn-block" id="backtoindex">

</div>
<?php
$this->registerJs(<<<JS
    $("#backtoindex").click(function(e){
        window.location = "?r=supplier"
    });
JS
);
?>