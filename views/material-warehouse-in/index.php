<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialWarehouseIn */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Warehouse Ins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-in-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Material Warehouse In', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'warehouse_id',
            'material_id',
            'material_in_orderid',
            'material_in_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
