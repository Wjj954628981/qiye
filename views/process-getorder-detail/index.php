<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProcessGetorderDetail */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Process Getorder Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="process-getorder-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Process Getorder Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'process_getorderid',
            'material_id',
            'material_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
