<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchEmployee */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employee_id',
            'department_id',
            'warehouse_id',
            'employee_name',
            'sex',
            // 'job_name',
            // 'email:email',
            // 'address',
            // 'join_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
