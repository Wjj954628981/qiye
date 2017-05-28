<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MaterialCategory;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>


	<?php 
	$cgObjs = MaterialCategory::find()->all();
	$allCategory = ArrayHelper::map($cgObjs, 'material_category_id', 'material_category_name');
	?>
	    <?= $form->field($model, 'material_id')->textInput()->label('物料型号')?>
	
    <?= $form->field($model, 'material_category_id')
    	->dropDownList($allCategory,
    			['prompt'=>'请选择物料种类']);?>

    <?= $form->field($model, 'material_name')->textInput(['maxlength' => true])->label('物料名称') ?>

    <?= $form->field($model, 'material_min')->textInput()->label('最小物料量')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
