<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategoryKey */

$this->title = 'Create Material Category Key';
$this->params['breadcrumbs'][] = ['label' => 'Material Category Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-category-key-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
