<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\MaterialCategory;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = $model->material_name;
$this->params['breadcrumbs'][] = ['label' => '物料目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="material-view">


    <p>
        <?= Html::a('修改', ['update', 'id' => $model->material_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->material_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定删除该条记录?该操作不可逆',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'material_id',
            ['attribute'=>'material_category_id',
            		'label'=>'物料类别名称',
            		'value'=>$model->materialCategory->material_category_name,
            		],
            'material_name',
            'material_min',
        ],
    ]) ?>

</div>
