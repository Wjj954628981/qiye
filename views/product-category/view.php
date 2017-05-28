<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategory */

$this->title = $model->product_category_name;
$this->params['breadcrumbs'][] = ['label' => '产品类别目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-view">

<br>
    <p>
        <?= Html::a('修改类别信息', ['update', 'id' => $model->product_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除类别信息', ['delete', 'id' => $model->product_category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该类别么?该操作不可逆。',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        		
			[
        			'attribute'=>'product_category_id',
        			'label'=>'产品类别目录ID',
        			'value'=>$model->product_category_id,
        	],
        		[
        				'attribute'=>'product_category_name',
        				'label'=>'产品类别目录',
        				'value'=>$model->product_category_name,
        		],
        ],
    ]) ?>

</div>
