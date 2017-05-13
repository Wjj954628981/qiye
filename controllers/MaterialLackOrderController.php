<?php

namespace app\controllers;

use Yii;
use app\models\WarehouseMaterial;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class MaterialLackOrderController extends Controller
{

    public function actionIndex()
    {

        $query = WarehouseMaterial::find()->joinWith('material')->where('warehouse_material.material_count < material.material_min');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->pagination->defaultPageSize =10;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
