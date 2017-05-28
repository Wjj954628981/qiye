<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductMaterial;
use app\models\SearchProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Material;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
   public function actionIndex()
    {
        $searchModelProduct = new SearchProduct();
        $dataProviderProduct = $searchModelProduct->search(Yii::$app->request->queryParams);
        $dataProviderProduct->Pagination->defaultPageSize = 10;


        return $this->render('index', [
            'searchModelProduct' => $searchModelProduct,
            'dataProviderProduct' => $dataProviderProduct,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       return $this->render('create');
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest(){
        $key=Yii::$app->request->post('key');
        echo $key;
    }

    public function actionAdd(){
        $key=Yii::$app->request->post('key');
        $cookies = Yii::$app->response->cookies;
 
        $cookies->add(new \yii\web\Cookie([
            'name' => 'message'.$key,
            'value' => 1,
            'expire'=>time()+360
        ]));

        return $this->redirect(['create']);
        // $material_name = Material::find()->where(['material_id'=>$key])->one()['material_name'];
        // $result = array('material_name'=>$material_name, 'value'=>1);
        // echo json_encode($result);
    }
    public function actionDelete($id)
    {

    	$temp = ProductMaterial::find()->where(['product_id' => $id])->all();
    	foreach ($temp as $key){
    		$key->delete();
    	}
    	$this->findModel($id)->delete();
    	return $this->redirect(['index']);
    }
    

    public function actionDelete1(){
        $key=Yii::$app->request->post('key');
        $cookies = Yii::$app->response->cookies;

        $cookies->remove('message'.$key);

        return $this->redirect(['create']);
    }

    public function actionConfirm(){
        $key=Yii::$app->request->post('key');
        $num=Yii::$app->request->post('num');
        $cookies = Yii::$app->response->cookies;
 
        $cookies->add(new \yii\web\Cookie([
            'name' => 'message'.$key,
            'value' => $num,
            'expire'=>time()+360
        ]));

        return $this->redirect(['create']);
    }

    public function actionNew(){
        $product_id=Yii::$app->request->post('product_id');
        $product_category_id=Yii::$app->request->post('product_category_id');
        $product_name=Yii::$app->request->post('product_name');
        $product_price=Yii::$app->request->post('product_price');

 // var_dump($product_id);
        $cookies_response = Yii::$app->response->cookies;

        $count = Material::find()->count();
        $cookies_request = Yii::$app->request->cookies;

        $messages = array();
        for($i=0;$i<$count;$i++){
            if(($item = $cookies_request->get('message'.$i))!=NULL){
                $messages[] = array('id'=>$i,'num'=>$item);
            }
        }

        if(count($messages)>0){
            $model = new Product();
            $model->product_id = $product_id;
            $model->product_category_id = $product_category_id;
            $model->product_name =$product_name;
            $model->product_price = $product_price;
            $model->save(false);
               

            if($model->save()>0){
                foreach ($messages as $message) {
                    $modeldetail = new ProductMaterial();
                    $modeldetail->product_id = $product_id;
                    $modeldetail->material_id = $message['id'];
                    //界面中无所谓 控制器需要将cookie对象转换为string
                    $modeldetail->num_material = (string)$message['num'];
                    $modeldetail->save(false);

                    $cookies_response->remove('message'.$message['id']);
                }
            }
        }
         return $this->redirect(['view','id'=>$model->product_id]);
    }
}
