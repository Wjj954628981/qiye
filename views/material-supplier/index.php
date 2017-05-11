<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMaterialSupplier */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Material Supplier', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'supplier_id',
            'material_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
