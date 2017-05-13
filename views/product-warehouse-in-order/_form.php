<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseInOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-warehouse-in-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_in_orderid')->textInput() ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <?= $form->field($model, 'product_in_ordertime')->textInput() ?>

    <?= $form->field($model, 'product_in_orderremark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
