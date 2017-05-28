<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ProductCategory;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    	
	<?php 
	$cgObjs = ProductCategory::find()->all();
	$allCategory = ArrayHelper::map($cgObjs, 'product_category_id', 'product_category_name')
	?>
    <?= $form->field($model, 'product_category_id')
    	->dropDownList($allCategory,
    			['prompt'=>'请选择产品种类']);?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
