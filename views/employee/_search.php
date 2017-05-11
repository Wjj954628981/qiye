<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'warehouse_id') ?>

    <?= $form->field($model, 'employee_name') ?>

    <?= $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'job_name') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'join_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
