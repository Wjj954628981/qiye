<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategoryKey */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-category-key-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_category_id')->textInput() ?>

    <?= $form->field($model, 'pro_product_category_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
