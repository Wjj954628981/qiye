<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWarehouseMaterial */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-material-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Warehouse Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'material_id',
            'warehouse_id',
            'material_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
