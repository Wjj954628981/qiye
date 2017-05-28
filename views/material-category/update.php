<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategory */

$this->title = '修改物料类别信息 ' .'-'. $model->material_category_name;
$this->params['breadcrumbs'][] = ['label' => '物料类别目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_category_name, 'url' => ['view', 'id' => $model->material_category_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<br>
<div class="material-category-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
