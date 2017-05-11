<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProductWarehouseIn */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Warehouse Ins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-in-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Warehouse In', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_in_orderid',
            'warehouse_id',
            'product_in_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
