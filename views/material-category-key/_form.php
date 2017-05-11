<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategoryKey */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-category-key-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_category_id')->textInput() ?>

    <?= $form->field($model, 'mat_material_category_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
