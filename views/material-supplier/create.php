<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialSupplier */

$this->title = 'Create Material Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Material Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-supplier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
