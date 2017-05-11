<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchMaterialWarehouseIn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-warehouse-in-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'warehouse_id') ?>

    <?= $form->field($model, 'material_id') ?>

    <?= $form->field($model, 'material_in_orderid') ?>

    <?= $form->field($model, 'material_in_count') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
