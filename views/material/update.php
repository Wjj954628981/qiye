<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = '修改物料信息' .'-'. $model->material_name;
$this->params['breadcrumbs'][] = ['label' => '物料目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_name, 'url' => ['view', 'id' => $model->material_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<br>
<div class="material-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
