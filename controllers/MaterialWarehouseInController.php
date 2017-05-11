<?php

namespace app\controllers;

use Yii;
use app\models\MaterialWarehouseIn;
use app\models\SearchMaterialWarehouseIn;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialWarehouseInController implements the CRUD actions for MaterialWarehouseIn model.
 */
class MaterialWarehouseInController extends Controller
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
     * Lists all MaterialWarehouseIn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMaterialWarehouseIn();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialWarehouseIn model.
     * @param integer $warehouse_id
     * @param integer $material_id
     * @param integer $material_in_orderid
     * @return mixed
     */
    public function actionView($warehouse_id, $material_id, $material_in_orderid)
    {
        return $this->render('view', [
            'model' => $this->findModel($warehouse_id, $material_id, $material_in_orderid),
        ]);
    }

    /**
     * Creates a new MaterialWarehouseIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialWarehouseIn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id, 'material_in_orderid' => $model->material_in_orderid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaterialWarehouseIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $warehouse_id
     * @param integer $material_id
     * @param integer $material_in_orderid
     * @return mixed
     */
    public function actionUpdate($warehouse_id, $material_id, $material_in_orderid)
    {
        $model = $this->findModel($warehouse_id, $material_id, $material_in_orderid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id, 'material_in_orderid' => $model->material_in_orderid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaterialWarehouseIn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $warehouse_id
     * @param integer $material_id
     * @param integer $material_in_orderid
     * @return mixed
     */
    public function actionDelete($warehouse_id, $material_id, $material_in_orderid)
    {
        $this->findModel($warehouse_id, $material_id, $material_in_orderid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialWarehouseIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $warehouse_id
     * @param integer $material_id
     * @param integer $material_in_orderid
     * @return MaterialWarehouseIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($warehouse_id, $material_id, $material_in_orderid)
    {
        if (($model = MaterialWarehouseIn::findOne(['warehouse_id' => $warehouse_id, 'material_id' => $material_id, 'material_in_orderid' => $material_in_orderid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
