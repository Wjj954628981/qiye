<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchOrderlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderlist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'purchase_time') ?>

    <?= $form->field($model, 'duetime') ?>

    <?= $form->field($model, 'person_name') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'order_state') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
