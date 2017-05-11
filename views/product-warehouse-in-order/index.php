<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProductWarehouseInOrder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Warehouse In Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-warehouse-in-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Warehouse In Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_in_orderid',
            'employee_id',
            'product_in_ordertime:datetime',
            'product_in_orderremark',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
