<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProcessGetorderDetail */

$this->title = 'Create Process Getorder Detail';
$this->params['breadcrumbs'][] = ['label' => 'Process Getorder Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="process-getorder-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
