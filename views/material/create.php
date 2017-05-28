<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = '新建物料信息';
$this->params['breadcrumbs'][] = ['label' => '物料目录', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="material-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
