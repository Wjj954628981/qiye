<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProductCategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品类别目录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

<br>

    <p>
        <?= Html::a('新建一个产品类别', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['attribute'=>'product_category_name',
            	'label'=>'产品类别名称'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
