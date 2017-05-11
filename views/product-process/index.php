<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProductProcess */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Processes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-process-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Process', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'process_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
