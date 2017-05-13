<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orderlist */

$this->title = '修改'. $model->order_id.'号订单' ;
// $this->params['breadcrumbs'][] = ['label' => 'Orderlists', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'id' => $model->order_id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="orderlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
