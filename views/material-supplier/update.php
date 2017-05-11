<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialSupplier */

$this->title = 'Update Material Supplier: ' . $model->supplier_id;
$this->params['breadcrumbs'][] = ['label' => 'Material Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplier_id, 'url' => ['view', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-supplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
