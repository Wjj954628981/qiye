<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Material Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'material_category_id',
            'material_category_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
