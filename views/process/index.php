<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProcess */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Processes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="process-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Process', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'process_id',
            'description',
            'cost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
