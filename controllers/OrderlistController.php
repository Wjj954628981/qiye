<?php

namespace app\controllers;

use Yii;
use app\models\Orderlist;
use app\models\SearchOrderlist;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Product;
use app\models\OrderProduct;
use app\models\SearchOrderProduct;



/**
 * OrderlistController implements the CRUD actions for Orderlist model.
 */
class OrderlistController extends Controller
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
     * Lists all Orderlist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchOrderlist();
        $dataProvider = $searchModel->search([Yii::$app->request->queryParams]);
        $dataProvider->pagination->defaultPageSize =10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orderlist model.
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
     * Creates a new Orderlist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orderlist();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Orderlist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orderlist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeletes(){
        $key=Yii::$app->request->post('key');
        $cookies = Yii::$app->response->cookies;

        $cookies->remove('message'.$key);

        return $this->redirect(['create']);
    }
    /**
     * Finds the Orderlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orderlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orderlist::findOne($id)) !== null) {
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


        $duetime=Yii::$app->request->post('duetime');
        $customer_id=Yii::$app->request->post('customer_id');
        $telephone=Yii::$app->request->post('telephone');
        $person_name=Yii::$app->request->post('person_name');
//console.log("这是传"+duetime + " " + customer_id + " " + telephone);
        $cookies_response = Yii::$app->response->cookies;

        $count = Product::find()->count();
        $cookies_request = Yii::$app->request->cookies;

        $messages = array();
        for($i=0;$i<$count;$i++){
            if(($item = $cookies_request->get('message'.$i))!=NULL){
                $messages[] = array('id'=>$i,'num'=>$item);
            }
        }

        if(count($messages)>0){
            $model = new Orderlist();
           $model->order_id = null;
            $model->customer_id = $customer_id;
            $model->purchase_time = time();
            $model->duetime = $duetime;
            $model->person_name = $person_name;
        $model->telephone = $telephone;
           $model->order_state = 0;

           //if($model->save()>0){
           $model->save(false);
                foreach ($messages as $message) {
                    $modeldetail = new OrderProduct();
                    $modeldetail->order_id = $model->order_id;
                    $modeldetail->product_id = $message['id'];
                    //$modeldetail->material_in_orderid = $model->material_in_orderid;

                    //界面中无所谓 控制器需要将cookie对象转换为string
                    $modeldetail->product_count = (string)$message['num'];
                    $modeldetail->save(false) ;
                }
                 return $this->redirect(['view','id'=>$model->order_id]);
          //  }
            

        }
      
    }

    public function actionDecompose(){
        $keys=Yii::$app->request->post('keys');
        echo "<br><br><br><br><br><br><br>";
        var_dump(1);
        var_dump(2);
        var_dump(3);
        var_dump($keys);
        // foreach ($keys as $key) {
        //     $this->resolve($key);
        // }
    }

    public function resolve($order_id)
    {
        header("Content-type:text/html;charset=utf-8");
        $products = OrderProduct::find()->where(['order_id' => $order_id])->all();
        foreach($products as $product)
        {
            $product_id = $product['product_id'];
            $product_num = $product['product_count'];
            $process = Process::find()->where(['product_id' => $product_id])->one();
            $process_id = $process['process_id'];
            $this->newgetorder($product_id,$product_num,$process_id);
            //var_dump($process_id['description']);

            $order = Orderlist::findOne($order_id);
            $order->order_state = 1;
            $order->save(); // 等同于 $User->update();
        }
    }

    public function newgetorder($product_id,$product_num,$process_id)
    {
        $newprocess_getorder = new ProcessGetorder();
        $newprocess_getorder->process_getorderid = null;
        $newprocess_getorder->process_id = $process_id;
        $newprocess_getorder->process_getordertime = time();

        var_dump($newprocess_getorder->process_id);
        var_dump($newprocess_getorder->process_getordertime);
        var_dump($newprocess_getorder->process_getorderid);

        $newprocess_getorder->save(false);


        $materials = $this->findMaterial($product_id);
        foreach($materials as $material) {
            $newdetail = new ProcessGetorderDetail();
            $newdetail->process_getorderid = $newprocess_getorder->process_getorderid;
            $newdetail->material_id = $material['material_id'];
            $newdetail->material_count = $material['num_material']*$product_num;
            $newdetail->save(false);
        }

    }

    public function findMaterial($product_id){
        $materials = ProductMaterial::find()->where(['product_id' => $product_id])->all();

        return $materials;
    }


}
