<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWarehouseProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Warehouse Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'warehouse_id',
            'product_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
