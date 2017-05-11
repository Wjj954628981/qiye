<?php

namespace app\controllers;

use Yii;
use app\models\ProductMaterial;
use app\models\SearchProductMaterial;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductMaterialController implements the CRUD actions for ProductMaterial model.
 */
class ProductMaterialController extends Controller
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
     * Lists all ProductMaterial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProductMaterial();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductMaterial model.
     * @param integer $product_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionView($product_id, $material_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $material_id),
        ]);
    }

    /**
     * Creates a new ProductMaterial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductMaterial();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'material_id' => $model->material_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductMaterial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionUpdate($product_id, $material_id)
    {
        $model = $this->findModel($product_id, $material_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'material_id' => $model->material_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductMaterial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionDelete($product_id, $material_id)
    {
        $this->findModel($product_id, $material_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductMaterial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $material_id
     * @return ProductMaterial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $material_id)
    {
        if (($model = ProductMaterial::findOne(['product_id' => $product_id, 'material_id' => $material_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
