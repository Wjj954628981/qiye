<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategory */

$this->title = 'Create Material Category';
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
