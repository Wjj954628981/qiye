<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductCategoryKey */

$this->title = 'Create Product Category Key';
$this->params['breadcrumbs'][] = ['label' => 'Product Category Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-key-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
