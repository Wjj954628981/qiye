<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = '更新供货商: ' . $model->supplier_id;
// $this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->supplier_id, 'url' => ['view', 'id' => $model->supplier_id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
