<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategory */

$this->title = $model->material_category_name;
$this->params['breadcrumbs'][] = ['label' => '物料类别目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="material-category-view">


    <p>
        <?= Html::a('修改', ['update', 'id' => $model->material_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->material_category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确认删除该条类别信息?该操作不可逆',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        		
            ['attribute'=>'material_category_id',
            		'label'=>'物料类别ID'],
        		['attribute'=>'material_category_name',
        				'label'=>'物料类别名称'],
        ],
    ]) ?>

</div>
