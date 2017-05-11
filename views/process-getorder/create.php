<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProcessGetorder */

$this->title = 'Create Process Getorder';
$this->params['breadcrumbs'][] = ['label' => 'Process Getorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="process-getorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
