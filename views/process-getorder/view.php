<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProcessGetorder */

$this->title = $model->process_getorderid;
$this->params['breadcrumbs'][] = ['label' => 'Process Getorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="process-getorder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->process_getorderid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->process_getorderid], [
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
            'process_id',
            'process_getordertime:datetime',
        ],
    ]) ?>

</div>
