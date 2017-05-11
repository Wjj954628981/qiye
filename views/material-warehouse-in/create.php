<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseIn */

$this->title = 'Create Material Warehouse In';
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-in-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
