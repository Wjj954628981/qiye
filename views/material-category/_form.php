<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-category-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'material_category_id')->textInput()->label('物料类别型号')?>
    


    <?= $form->field($model, 'material_category_name')->textInput(['maxlength' => true])->label('物料类别名称')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
