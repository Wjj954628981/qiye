<?php

namespace app\controllers;

use Yii;
use app\models\MaterialWarehouseOut;
use app\models\SearchMaterialWarehouseOut;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialWarehouseOutController implements the CRUD actions for MaterialWarehouseOut model.
 */
class MaterialWarehouseOutController extends Controller
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
     * Lists all MaterialWarehouseOut models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMaterialWarehouseOut();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->defaultPageSize =10;


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialWarehouseOut model.
     * @param integer $material_out_orderid
     * @param integer $warehouse_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionView($material_out_orderid, $warehouse_id, $material_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($material_out_orderid, $warehouse_id, $material_id),
        ]);
    }

    /**
     * Creates a new MaterialWarehouseOut model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialWarehouseOut();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'material_out_orderid' => $model->material_out_orderid, 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaterialWarehouseOut model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $material_out_orderid
     * @param integer $warehouse_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionUpdate($material_out_orderid, $warehouse_id, $material_id)
    {
        $model = $this->findModel($material_out_orderid, $warehouse_id, $material_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'material_out_orderid' => $model->material_out_orderid, 'warehouse_id' => $model->warehouse_id, 'material_id' => $model->material_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaterialWarehouseOut model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $material_out_orderid
     * @param integer $warehouse_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionDelete($material_out_orderid, $warehouse_id, $material_id)
    {
        $this->findModel($material_out_orderid, $warehouse_id, $material_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialWarehouseOut model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $material_out_orderid
     * @param integer $warehouse_id
     * @param integer $material_id
     * @return MaterialWarehouseOut the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($material_out_orderid, $warehouse_id, $material_id)
    {
        if (($model = MaterialWarehouseOut::findOne(['material_out_orderid' => $material_out_orderid, 'warehouse_id' => $warehouse_id, 'material_id' => $material_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
