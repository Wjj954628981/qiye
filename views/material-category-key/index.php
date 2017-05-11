<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialCategoryKey */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Category Keys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-category-key-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Material Category Key', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'material_category_id',
            'mat_material_category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
