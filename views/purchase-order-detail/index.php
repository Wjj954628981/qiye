<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPurchaseOrderDetail */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Order Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Purchase Order Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'supplier_id',
            'material_id',
            'purchase_order_id',
            'material_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
