<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialWarehouseInOrder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Warehouse In Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-in-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Material Warehouse In Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'material_in_orderid',
            'employee_id',
            'material_in_ordertime:datetime',
            'material_in_orderremark',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
