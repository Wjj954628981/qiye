<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSupplier */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Supplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'supplier_id',
            'company_name',
            'address',
            'telephone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
