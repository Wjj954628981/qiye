<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSupplier */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '供应商';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'supplier_id',
                'enableSorting'=>false,
                // 'format'=>'raw',
                // 'value'=> function($data){
                //     $address= "http://localhost/qiye/web/index.php?SearchMaterialSupplier%5Bsupplier_id%5D=$data->supplier_id&SearchMaterialSupplier%5Bmaterial_id%5D=&r=material-supplier";
                //     return Html::a($data->supplier_id,$address, ['title' => '供应商编号']);
                // }
            ],
            [
                'attribute'=>'company_name',
                'enableSorting'=>false
            ],
            [
                'attribute'=>'address',
                'enableSorting'=>false
            ],
            [
                'attribute'=>'telephone',
                'enableSorting'=>false
            ],
            [
                'header' => "操作",
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    switch($action)
                    {
                        case 'view':
                            return 'index.php?r=supplier/view&id=' . $model->supplier_id;
                            break;
                        case 'update':
                            return 'index.php?r=supplier/view&id=' . $model->supplier_id;
                            break;
                        case 'delete':
                            return 'index.php?r=supplier/delete&id='.$model->supplier_id;
                            break;
                    }

                },
            ],
        ],
        'emptyText'=>'当前无数据',
        'emptyTextOptions'=>['style'=>'font-weight:bold'],
        'layout'=>"{items}\n{pager}",
        'showOnEmpty'=>false,
    ]); ?>
</div>
