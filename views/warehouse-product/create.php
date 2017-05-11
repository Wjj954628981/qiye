<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WarehouseProduct */

$this->title = 'Create Warehouse Product';
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
