<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orderlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'purchase_time')->textInput() ?>

    <?= $form->field($model, 'duetime')->textInput() ?>

    <?= $form->field($model, 'person_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput() ?>

    <?= $form->field($model, 'order_state')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
