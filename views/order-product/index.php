<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchOrderProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Order Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',
            'product_id',
            'product_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
