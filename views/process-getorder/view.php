<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ProcessGetorder */

$this->title = $model->process_getorderid;
// $this->params['breadcrumbs'][] = ['label' => 'Process Getorders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="process-getorder-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'process_getorderid',
            'process_id',
            'process_getordertime:datetime',
        ],
    ]) ?>

    <h1>领料单详情</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'process_getorderid',
                'enableSorting'=>false
            ],
            [
                'label'=>'材料名称',
                'value'=>'material.material_name',
                'enableSorting'=>false
            ],
            [
                'attribute'=>'material_count',
                'enableSorting'=>false
            ]
            // 'material_in_orderremark',

            // [
            //     'header' => "操作",
            //     'class' => 'yii\grid\ActionColumn',
            //     'template' => '{view}',
            // ]
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        'showOnEmpty'=>false,
    ]); ?>

    <input type="button" value="返回" class="btn btn-primary btn-lg btn-block" id="backtoindex">
</div>

<?php
$this->registerJs(<<<JS
    $("#backtoindex").click(function(e){
        window.location = "?r=process-getorder/index&id="
    });
JS
);
?>