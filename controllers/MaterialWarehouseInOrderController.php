<?php

namespace app\controllers;

use Yii;
use app\models\MaterialWarehouseInOrder;
use app\models\SearchMaterialWarehouseInOrder;
use app\models\ProductWarehouseInOrder;
use app\models\SearchProductWarehouseInOrder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialWarehouseInOrderController implements the CRUD actions for MaterialWarehouseInOrder model.
 */
class MaterialWarehouseInOrderController extends Controller
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
     * Lists all MaterialWarehouseInOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelMaterialWarehouseInOrder = new SearchMaterialWarehouseInOrder();
        $dataProviderMaterialWarehouseInOrder = $searchModelMaterialWarehouseInOrder->search(Yii::$app->request->queryParams);
        $dataProviderMaterialWarehouseInOrder->Pagination->defaultPageSize = 5;

        $searchModelProductWarehouseInOrder = new SearchProductWarehouseInOrder();
        $dataProviderProductWarehouseInOrder = $searchModelProductWarehouseInOrder->search(Yii::$app->request->queryParams);
        $dataProviderProductWarehouseInOrder->Pagination->defaultPageSize = 5;

        return $this->render('index', [
            'searchModelMaterialWarehouseInOrder' => $searchModelMaterialWarehouseInOrder,
            'dataProviderMaterialWarehouseInOrder' => $dataProviderMaterialWarehouseInOrder,

            'searchModelProductWarehouseInOrder' => $searchModelProductWarehouseInOrder,
            'dataProviderProductWarehouseInOrder' => $dataProviderProductWarehouseInOrder,
        ]);
    }

    /**
     * Displays a single MaterialWarehouseInOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MaterialWarehouseInOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        return $this->render('create');
    }

    /**
     * Updates an existing MaterialWarehouseInOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->material_in_orderid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the MaterialWarehouseInOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialWarehouseInOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialWarehouseInOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    public function actionAdd(){
        $key=Yii::$app->request->post('key');
        $cookies = Yii::$app->response->cookies;
 
        $cookies->add(new \yii\web\Cookie([
            'name' => 'message'.$key,
            'value' => 0,
            'expire'=>time()+360
        ]));

        return $this->redirect(['create']);
    }

    public function actionDelete($id){
        $cookies = Yii::$app->request->cookies;

        $cookies->remove('message'.$id);
    }

    public function actionChange($num, $id){
        $cookies = Yii::$app->response->cookies;
 
        $cookies->add(new \yii\web\Cookie([
            'name' => 'message'.$id,
            'value' => $num,
            'expire'=>time()+360
        ]));
    }
}
