<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOut */

$this->title = 'Create Material Warehouse Out';
$this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Outs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-out-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
