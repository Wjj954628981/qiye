<?php

namespace app\controllers;

use Yii;
use app\models\ProductWarehouseIn;
use app\models\SearchProductWarehouseIn;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductWarehouseInController implements the CRUD actions for ProductWarehouseIn model.
 */
class ProductWarehouseInController extends Controller
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
     * Lists all ProductWarehouseIn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProductWarehouseIn();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductWarehouseIn model.
     * @param integer $product_id
     * @param integer $product_in_orderid
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionView($product_id, $product_in_orderid, $warehouse_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $product_in_orderid, $warehouse_id),
        ]);
    }

    /**
     * Creates a new ProductWarehouseIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductWarehouseIn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'product_in_orderid' => $model->product_in_orderid, 'warehouse_id' => $model->warehouse_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductWarehouseIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $product_in_orderid
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionUpdate($product_id, $product_in_orderid, $warehouse_id)
    {
        $model = $this->findModel($product_id, $product_in_orderid, $warehouse_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'product_in_orderid' => $model->product_in_orderid, 'warehouse_id' => $model->warehouse_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductWarehouseIn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $product_in_orderid
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionDelete($product_id, $product_in_orderid, $warehouse_id)
    {
        $this->findModel($product_id, $product_in_orderid, $warehouse_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductWarehouseIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $product_in_orderid
     * @param integer $warehouse_id
     * @return ProductWarehouseIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $product_in_orderid, $warehouse_id)
    {
        if (($model = ProductWarehouseIn::findOne(['product_id' => $product_id, 'product_in_orderid' => $product_in_orderid, 'warehouse_id' => $warehouse_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
