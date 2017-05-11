<?php

namespace app\controllers;

use Yii;
use app\models\WarehouseProduct;
use app\models\SearchWarehouseProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WarehouseProductController implements the CRUD actions for WarehouseProduct model.
 */
class WarehouseProductController extends Controller
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
     * Lists all WarehouseProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchWarehouseProduct();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WarehouseProduct model.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionView($product_id, $warehouse_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $warehouse_id),
        ]);
    }

    /**
     * Creates a new WarehouseProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WarehouseProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing WarehouseProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionUpdate($product_id, $warehouse_id)
    {
        $model = $this->findModel($product_id, $warehouse_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'warehouse_id' => $model->warehouse_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WarehouseProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @return mixed
     */
    public function actionDelete($product_id, $warehouse_id)
    {
        $this->findModel($product_id, $warehouse_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WarehouseProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $warehouse_id
     * @return WarehouseProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $warehouse_id)
    {
        if (($model = WarehouseProduct::findOne(['product_id' => $product_id, 'warehouse_id' => $warehouse_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
