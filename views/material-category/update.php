<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategory */

$this->title = 'Update Material Category: ' . $model->material_category_id;
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_category_id, 'url' => ['view', 'id' => $model->material_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
