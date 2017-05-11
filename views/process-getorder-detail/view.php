<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProcessGetorderDetail */

$this->title = $model->process_getorderid;
$this->params['breadcrumbs'][] = ['label' => 'Process Getorder Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="process-getorder-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'process_getorderid' => $model->process_getorderid, 'material_id' => $model->material_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'process_getorderid' => $model->process_getorderid, 'material_id' => $model->material_id], [
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
            'process_getorderid',
            'material_id',
            'material_count',
        ],
    ]) ?>

</div>
