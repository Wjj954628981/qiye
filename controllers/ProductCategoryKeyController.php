<?php

namespace app\controllers;

use Yii;
use app\models\ProductCategoryKey;
use app\models\SearchProductCategoryKey;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductCategoryKeyController implements the CRUD actions for ProductCategoryKey model.
 */
class ProductCategoryKeyController extends Controller
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
     * Lists all ProductCategoryKey models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProductCategoryKey();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductCategoryKey model.
     * @param integer $product_category_id
     * @param integer $pro_product_category_id
     * @return mixed
     */
    public function actionView($product_category_id, $pro_product_category_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_category_id, $pro_product_category_id),
        ]);
    }

    /**
     * Creates a new ProductCategoryKey model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductCategoryKey();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_category_id' => $model->product_category_id, 'pro_product_category_id' => $model->pro_product_category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductCategoryKey model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_category_id
     * @param integer $pro_product_category_id
     * @return mixed
     */
    public function actionUpdate($product_category_id, $pro_product_category_id)
    {
        $model = $this->findModel($product_category_id, $pro_product_category_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_category_id' => $model->product_category_id, 'pro_product_category_id' => $model->pro_product_category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductCategoryKey model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_category_id
     * @param integer $pro_product_category_id
     * @return mixed
     */
    public function actionDelete($product_category_id, $pro_product_category_id)
    {
        $this->findModel($product_category_id, $pro_product_category_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductCategoryKey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_category_id
     * @param integer $pro_product_category_id
     * @return ProductCategoryKey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_category_id, $pro_product_category_id)
    {
        if (($model = ProductCategoryKey::findOne(['product_category_id' => $product_category_id, 'pro_product_category_id' => $pro_product_category_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
