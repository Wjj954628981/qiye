<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductCategory */

$this->title = '修改产品信息: ' .'-'. $model->product_category_name;
$this->params['breadcrumbs'][] = ['label' => '产品类别', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_category_name, 'url' => ['view', 'id' => $model->product_category_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="product-category-update">

<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
