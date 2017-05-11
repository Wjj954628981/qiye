<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchOrderlist */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderlist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orderlist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\CheckBoxColumn',
            // 'checkboxOptions' => function($searchModel, $key, $index, $column) {
            //     echo '<br/><br/><br/><br/><br/>';
            //     var_dump($searchModel->order_id);
            // }],

            'order_id',
            'customer_id',
            'purchase_time:datetime',
            'duetime:datetime',
            'person_name',
            // 'telephone',
            // 'order_state',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
