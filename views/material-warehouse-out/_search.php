<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchMaterialWarehouseOut */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-warehouse-out-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'material_out_orderid') ?>

    <?= $form->field($model, 'warehouse_id') ?>

    <?= $form->field($model, 'material_id') ?>

    <?= $form->field($model, 'material_out_count') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
