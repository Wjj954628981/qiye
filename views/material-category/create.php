<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialCategory */

$this->title = '新建一个物料类别';
$this->params['breadcrumbs'][] = ['label' => '物料类别目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="material-category-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
