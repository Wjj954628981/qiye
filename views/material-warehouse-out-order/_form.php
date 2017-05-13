<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOutOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-warehouse-out-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_out_orderid')->textInput() ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <?= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'material_out_ordertime')->textInput() ?>

    <?= $form->field($model, 'material_out_orderstate')->textInput() ?>

    <?= $form->field($model, 'material_out_orderremark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
