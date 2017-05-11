<?php

namespace app\controllers;

use Yii;
use app\models\Warehouse;
use app\models\Material;
use app\models\Product;
use app\models\SearchWarehouse;
use app\models\WarehouseMaterial;
use app\models\SearchWarehouseMaterial;
use app\models\WarehouseProduct;
use app\models\SearchWarehouseProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\searchForm;

/**
 * WarehouseController implements the CRUD actions for Warehouse model.
 */
class WarehouseController extends Controller
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
     * Lists all Warehouse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelWarehouse = new SearchWarehouse();
        $dataProviderWarehouse = $searchModelWarehouse->search(Yii::$app->request->queryParams);
        $dataProviderWarehouse->pagination->defaultPageSize =5;

        $searchModelWarehouseMaterial = new SearchWarehouseMaterial();
        $dataProviderWarehouseMaterial = $searchModelWarehouseMaterial->search(Yii::$app->request->queryParams);
        $dataProviderWarehouseMaterial->pagination->defaultPageSize =5;

        $searchModelWarehouseProduct = new SearchWarehouseProduct();
        $dataProviderWarehouseProduct = $searchModelWarehouseProduct->search(Yii::$app->request->queryParams);
        $dataProviderWarehouseProduct->pagination->defaultPageSize =5;
        $model = new searchForm();
        if ($model->load(Yii::$app->request->post())){
            //Yii::info(Yii::$app->request->post(), 'myinfo');
            $warehouse_id = $model->warehouse_id;
            $name = $model->item_name;
            // echo "<br /><br /><br /><br /><br /><br />";
            // echo $warehouse_id;
            //$warehouse_id = '1';
            //$name = 'OPYR8W5IX4GY6O RKA6ACTQKMO3E3VVPD68YJAKUC CD7JKYNY';

            $searchModelWarehouse = new SearchWarehouse(['warehouse_id'=>$warehouse_id]);
            $dataProviderWarehouse = $searchModelWarehouse->search([]);
            $dataProviderWarehouse->pagination->defaultPageSize =5;

            if(($model1 = Material::findByMaterialName($name)) != NULL){
                $searchModelWarehouseMaterial = new SearchWarehouseMaterial(['material_id' => $model1->material_id]);
                $dataProviderWarehouseMaterial = $searchModelWarehouseMaterial->search([]);
                $dataProviderWarehouseMaterial->pagination->defaultPageSize =5;

                $searchModelWarehouseProduct = new SearchWarehouseProduct();
                $dataProviderWarehouseProduct = $searchModelWarehouseProduct->search([]);
                $dataProviderWarehouseProduct->pagination->defaultPageSize =5;
            }
            

            if(($model2 = Product::findByProductName($name)) != NULL){
                $searchModelWarehouseMaterial = new SearchWarehouseMaterial();
                $dataProviderWarehouseMaterial = $searchModelWarehouseMaterial->search([]);
                $dataProviderWarehouseMaterial->pagination->defaultPageSize =5;

                $searchModelWarehouseProduct = new SearchWarehouseProduct(['product_id' => $model2->product_id]);
                $dataProviderWarehouseProduct = $searchModelWarehouseProduct->search([]);
                $dataProviderWarehouseProduct->pagination->defaultPageSize =5;
            }
        }

        return $this->render('index', [
            'searchModelWarehouse' => $searchModelWarehouse,
            'dataProviderWarehouse' => $dataProviderWarehouse,
            'searchModelWarehouseMaterial' => $searchModelWarehouseMaterial,
            'dataProviderWarehouseMaterial' => $dataProviderWarehouseMaterial,
            'searchModelWarehouseProduct' => $searchModelWarehouseProduct,
            'dataProviderWarehouseProduct' => $dataProviderWarehouseProduct,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Warehouse model.
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
     * Creates a new Warehouse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Warehouse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->warehouse_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Warehouse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->warehouse_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Warehouse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Warehouse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Warehouse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Warehouse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // public function actionSearch()
    // {
    //     // $warehouse_id = Yii::app()->request->post('warehouse_id');
    //     // $name = Yii::app()->request->post('item_name');

    //     $model = new Warehouse();

    //     var_dump(Yii::$app->request->post());
    //     /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         var_dump(Yii::$app->request->post());
    //         //return $this->redirect(['view', 'id' => $model->warehouse_id]);

    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }*/
    //     // $searchModelWarehouse = new SearchWarehouse(['warehouse_id'=>$this->warehouse_id]);
    //     // $dataProviderWarehouse = $searchModelWarehouse->search(Yii::$app->request->queryParams);
    //     // $dataProviderWarehouse->pagination->defaultPageSize =5;

    //     // if(Material::model()->findByMaterialName($name)){
    //     //     $searchModelWarehouseMaterial = new SearchWarehouseMaterial(['warehouse_id'=>$warehouse_id,'material_name'=>$name]);
    //     //     $dataProviderWarehouseMaterial = $searchModelWarehouseMaterial->search(Yii::$app->request->queryParams);
    //     //     $dataProviderWarehouseMaterial->pagination->defaultPageSize =5;

    //     //     $searchModelWarehouseProduct = new SearchWarehouseProduct();
    //     //     $dataProviderWarehouseProduct = $searchModelWarehouseProduct->search(Yii::$app->request->queryParams);
    //     //     $dataProviderWarehouseProduct->pagination->defaultPageSize =5;
    //     // }
        

    //     // if(Product::model()->findByProductName($name)){
    //     //     $searchModelWarehouseMaterial = new SearchWarehouseMaterial();
    //     //     $dataProviderWarehouseMaterial = $searchModelWarehouseMaterial->search(Yii::$app->request->queryParams);
    //     //     $dataProviderWarehouseMaterial->pagination->defaultPageSize =5;

    //     //     $searchModelWarehouseProduct = new SearchWarehouseProduct(['warehouse_id'=>$warehouse_id,'product_name'=>$name]);
    //     //     $dataProviderWarehouseProduct = $searchModelWarehouseProduct->search(Yii::$app->request->queryParams);
    //     //     $dataProviderWarehouseProduct->pagination->defaultPageSize =5;
    //     // }

    //     // return $this->render('index', [
    //     //     // 'searchModelWarehouse' => $searchModelWarehouse,
    //     //     'dataProviderWarehouse' => $dataProviderWarehouse,
    //     //     // 'searchModelWarehouseMaterial' => $searchModelWarehouseMaterial,
    //     //     'dataProviderWarehouseMaterial' => $dataProviderWarehouseMaterial,
    //     //     // 'searchModelWarehouseProduct' => $searchModelWarehouseProduct,
    //     //     'dataProviderWarehouseProduct' => $dataProviderWarehouseProduct,
    //     // ]);
    // }
}
