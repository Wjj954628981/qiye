<?php
namespace app\models;

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品目录';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>

<div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

       <p>
        <?= Html::a('新建一个产品信息', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
    		'dataProvider' => $dataProviderProduct,
    
    		'filterModel' => $searchModelProduct,
        'columns' => [

            [
            		'attribute'=>'product_id',
            		'headerOptions' => ['width' => '30'],
			],
        	[
        			'attribute'=>'product_category_id',
        			'label'=>'类别',
        			'value'=>'productCategory.product_category_name',
        			'headerOptions' => ['width' => '240'],
        			'filter'=>ProductCategory::find()
        					->select(['product_category_name','product_category_id'])
        					->orderBy('product_category_name')
        					->indexBy('product_category_id')
        					->column(),
            ],
            'product_name',
            'product_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
