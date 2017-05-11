<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProcessGetorderDetail */

$this->title = 'Update Process Getorder Detail: ' . $model->process_getorderid;
$this->params['breadcrumbs'][] = ['label' => 'Process Getorder Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->process_getorderid, 'url' => ['view', 'process_getorderid' => $model->process_getorderid, 'material_id' => $model->material_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="process-getorder-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
