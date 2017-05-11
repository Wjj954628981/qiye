<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */

$this->title = '修改仓库: ' . $model->warehouse_id;
$this->params['breadcrumbs'][] = ['label' => '仓库', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->warehouse_id, 'url' => ['view', 'id' => $model->warehouse_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="warehouse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
