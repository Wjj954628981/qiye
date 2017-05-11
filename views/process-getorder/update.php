<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProcessGetorder */

$this->title = 'Update Process Getorder: ' . $model->process_getorderid;
$this->params['breadcrumbs'][] = ['label' => 'Process Getorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->process_getorderid, 'url' => ['view', 'id' => $model->process_getorderid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="process-getorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
