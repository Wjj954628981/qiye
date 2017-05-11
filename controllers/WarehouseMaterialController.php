<?php

namespace app\controllers;

use Yii;
use app\models\WarehouseMaterial;
use app\models\SearchWarehouseMaterial;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WarehouseMaterialController implements the CRUD actions for WarehouseMaterial model.
 */
class WarehouseMaterialController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all WarehouseMaterial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchWarehouseMaterial();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WarehouseMaterial model.
     * @param integer $material_id
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionView($material_id, $warehouse_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($material_id, $warehouse_id),
        ]);
    }

    /**
     * Creates a new WarehouseMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WarehouseMaterial();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'material_id' => $model->material_id, 'warehouse_id' => $model->warehouse_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing WarehouseMaterial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $material_id
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionUpdate($material_id, $warehouse_id)
    {
        $model = $this->findModel($material_id, $warehouse_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'material_id' => $model->material_id, 'warehouse_id' => $model->warehouse_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WarehouseMaterial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $material_id
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionDelete($material_id, $warehouse_id)
    {
        $this->findModel($material_id, $warehouse_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WarehouseMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $material_id
     * @param integer $warehouse_id
     * @return WarehouseMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($material_id, $warehouse_id)
    {
        if (($model = WarehouseMaterial::findOne(['material_id' => $material_id, 'warehouse_id' => $warehouse_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
