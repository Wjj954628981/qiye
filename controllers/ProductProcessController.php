<?php

namespace app\controllers;

use Yii;
use app\models\ProductProcess;
use app\models\SearchProductProcess;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductProcessController implements the CRUD actions for ProductProcess model.
 */
class ProductProcessController extends Controller
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
     * Lists all ProductProcess models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProductProcess();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductProcess model.
     * @param integer $product_id
     * @param integer $process_id
     * @return mixed
     */
    public function actionView($product_id, $process_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $process_id),
        ]);
    }

    /**
     * Creates a new ProductProcess model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductProcess();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'process_id' => $model->process_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductProcess model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $process_id
     * @return mixed
     */
    public function actionUpdate($product_id, $process_id)
    {
        $model = $this->findModel($product_id, $process_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'process_id' => $model->process_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductProcess model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $process_id
     * @return mixed
     */
    public function actionDelete($product_id, $process_id)
    {
        $this->findModel($product_id, $process_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductProcess model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $process_id
     * @return ProductProcess the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $process_id)
    {
        if (($model = ProductProcess::findOne(['product_id' => $product_id, 'process_id' => $process_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
