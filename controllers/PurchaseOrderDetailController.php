<?php

namespace app\controllers;

use Yii;
use app\models\PurchaseOrderDetail;
use app\models\SearchPurchaseOrderDetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PurchaseOrderDetailController implements the CRUD actions for PurchaseOrderDetail model.
 */
class PurchaseOrderDetailController extends Controller
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
     * Lists all PurchaseOrderDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPurchaseOrderDetail();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PurchaseOrderDetail model.
     * @param integer $supplier_id
     * @param integer $material_id
     * @param integer $purchase_order_id
     * @return mixed
     */
    public function actionView($supplier_id, $material_id, $purchase_order_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($supplier_id, $material_id, $purchase_order_id),
        ]);
    }

    /**
     * Creates a new PurchaseOrderDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PurchaseOrderDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id, 'purchase_order_id' => $model->purchase_order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PurchaseOrderDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $supplier_id
     * @param integer $material_id
     * @param integer $purchase_order_id
     * @return mixed
     */
    public function actionUpdate($supplier_id, $material_id, $purchase_order_id)
    {
        $model = $this->findModel($supplier_id, $material_id, $purchase_order_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id, 'purchase_order_id' => $model->purchase_order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PurchaseOrderDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $supplier_id
     * @param integer $material_id
     * @param integer $purchase_order_id
     * @return mixed
     */
    public function actionDelete($supplier_id, $material_id, $purchase_order_id)
    {
        $this->findModel($supplier_id, $material_id, $purchase_order_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PurchaseOrderDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $supplier_id
     * @param integer $material_id
     * @param integer $purchase_order_id
     * @return PurchaseOrderDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($supplier_id, $material_id, $purchase_order_id)
    {
        if (($model = PurchaseOrderDetail::findOne(['supplier_id' => $supplier_id, 'material_id' => $material_id, 'purchase_order_id' => $purchase_order_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
