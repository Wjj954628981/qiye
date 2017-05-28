<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '物料类别目录';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="material-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建一个物料类别', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute'=>'material_category_name',
            		'label'=>'物料类别名称'
         ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
