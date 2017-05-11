<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategoryKey */

$this->title = $model->material_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Material Category Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-category-key-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'material_category_id' => $model->material_category_id, 'mat_material_category_id' => $model->mat_material_category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'material_category_id' => $model->material_category_id, 'mat_material_category_id' => $model->mat_material_category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'material_category_id',
            'mat_material_category_id',
        ],
    ]) ?>

</div>
