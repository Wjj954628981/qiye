<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategoryKey */

$this->title = 'Update Material Category Key: ' . $model->material_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Material Category Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_category_id, 'url' => ['view', 'material_category_id' => $model->material_category_id, 'mat_material_category_id' => $model->mat_material_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-category-key-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
