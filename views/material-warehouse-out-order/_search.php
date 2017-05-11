<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchMaterialWarehouseOutOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-warehouse-out-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'material_out_orderid') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'material_out_ordertime') ?>

    <?= $form->field($model, 'material_out_orderstate') ?>

    <?php // echo $form->field($model, 'material_out_orderremark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
