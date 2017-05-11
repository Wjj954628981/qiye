<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductProcess */

$this->title = 'Create Product Process';
$this->params['breadcrumbs'][] = ['label' => 'Product Processes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-process-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
