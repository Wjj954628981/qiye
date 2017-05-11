<?php

namespace app\controllers;

use Yii;
use app\models\ProductWarehouseOut;
use app\models\SearchProductWarehouseOut;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductWarehouseOutController implements the CRUD actions for ProductWarehouseOut model.
 */
class ProductWarehouseOutController extends Controller
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
     * Lists all ProductWarehouseOut models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProductWarehouseOut();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductWarehouseOut model.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @param integer $product_out_orderid
     * @return mixed
     */
    public function actionView($product_id, $warehouse_id, $product_out_orderid)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $warehouse_id, $product_out_orderid),
        ]);
    }

    /**
     * Creates a new ProductWarehouseOut model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductWarehouseOut();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id, 'product_out_orderid' => $model->product_out_orderid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductWarehouseOut model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @param integer $product_out_orderid
     * @return mixed
     */
    public function actionUpdate($product_id, $warehouse_id, $product_out_orderid)
    {
        $model = $this->findModel($product_id, $warehouse_id, $product_out_orderid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id, 'product_out_orderid' => $model->product_out_orderid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductWarehouseOut model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @param integer $product_out_orderid
     * @return mixed
     */
    public function actionDelete($product_id, $warehouse_id, $product_out_orderid)
    {
        $this->findModel($product_id, $warehouse_id, $product_out_orderid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductWarehouseOut model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @param integer $product_out_orderid
     * @return ProductWarehouseOut the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $warehouse_id, $product_out_orderid)
    {
        if (($model = ProductWarehouseOut::findOne(['product_id' => $product_id, 'warehouse_id' => $warehouse_id, 'product_out_orderid' => $product_out_orderid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
