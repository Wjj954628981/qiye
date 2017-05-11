<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchPurchaseOrderDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'supplier_id') ?>

    <?= $form->field($model, 'material_id') ?>

    <?= $form->field($model, 'purchase_order_id') ?>

    <?= $form->field($model, 'material_count') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
