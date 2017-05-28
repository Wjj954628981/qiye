<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Process;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProcessGetorder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '领料单';
$this->params['breadcrumbs'][] = $this->title;
$processes = Process::find()->all();
$list = array();
// for($i=0;$i<5;$i++){
//     $list[] = array('label'=>$i,'url'=>['']);
// }
foreach ($processes as $process) {
    $list[] = array('label'=>'流水线'.$process['process_id'],'url'=>['index','id'=>$process['process_id']]);
}
?>
<div class="process-getorder-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="row">
    <div class="col-md-2">
    <?= Nav::widget([
        // 'options' => ['class' => 'nav nav-list bs-docs-sidenav affix'],
        'items' =>$list
    ]); ?>
    </div>
    <div class="col-md-6">    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'process_getorderid',
                'enableSorting'=>false
            ],
            [
                'attribute'=>'process_id',
                'enableSorting'=>false
            ],
            [
                'attribute'=>'process_getordertime',
                'format'=>'datetime',
                'enableSorting'=>false
            ],
            [
                'header' => "操作",
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    switch($action)
                    {
                        case 'view':
                            return 'index.php?r=process-getorder%2Fview&id=' . $model->process_getorderid;
                            break;
                        // case 'update':
                        //     return 'index.php?r=product-warehouse-in-order%2Fupdate&id=' . $model->product_in_orderid;
                        //     break;
                    }

                },
            ],
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        'showOnEmpty'=>false,
    ]); ?>
    </div>
    </div>
</div>
