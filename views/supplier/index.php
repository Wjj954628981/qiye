<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSupplier */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '供应商';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Supplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'supplier_id',
            [
        'attribute'=>'supplier_id',
        'format'=>'raw',
        'value'=> function($data){
            //超链接
            $address= "http://localhost/qiye/web/index.php?SearchMaterialSupplier%5Bsupplier_id%5D=$data->supplier_id&SearchMaterialSupplier%5Bmaterial_id%5D=&r=material-supplier";
            return Html::a($data->supplier_id,$address, ['title' => '供应商编号']);
        }
],
            'company_name',
            'address',
            'telephone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
