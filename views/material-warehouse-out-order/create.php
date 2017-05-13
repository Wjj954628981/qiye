<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialWarehouseOutOrder */

$this->title = '创建材料出库单';
// $this->params['breadcrumbs'][] = ['label' => 'Material Warehouse Out Orders', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-warehouse-out-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
