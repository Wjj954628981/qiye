<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\MaterialCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterial */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '物料目录';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="material-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增物料信息', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'material_id',
           ['attribute'=> 'material_category_id',
           		'label'=>'物料类别',
           		'value'=>'materialCategory.material_category_name',
           		'filter'=>MaterialCategory::find()
           		->select(['material_category_name','material_category_id'])
           		->orderBy('material_category_name')
           		->indexBy('material_category_id')
           		->column(),],
            'material_name',
            'material_min',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
