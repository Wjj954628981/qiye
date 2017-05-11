<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOut */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-warehouse-out-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_out_orderid')->textInput() ?>

    <?= $form->field($model, 'warehouse_id')->textInput() ?>

    <?= $form->field($model, 'material_id')->textInput() ?>

    <?= $form->field($model, 'material_out_count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
