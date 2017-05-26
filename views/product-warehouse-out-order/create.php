<?php

use app\models\Orderlist;
use app\models\OrderProduct;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



/* @var $this yii\web\View */
/* @var $model app\models\ProductWarehouseOutOrder */

$this->title = '创建产品出库单';
?>

<?php
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'order_id')->textInput() ?>
    <?= $form->field($model, 'employee_id')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-20">
            <?= Html::submitButton('创建', ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-lg-20">
        
        </div>
    </div>
<?php ActiveForm::end() ?>