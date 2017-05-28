<?php

namespace app\controllers;

use Yii;
use app\models\ProductWarehouseOutOrder;
use app\models\ProductWarehouseOut;
use app\models\SearchProductWarehouseOutOrder;
use app\models\OrderProduct;
use app\models\WarehouseProduct;
use app\models\Orderlist;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
    
/**
 * ProductWarehouseOutOrderController implements the CRUD actions for ProductWarehouseOutOrder model.
 */
class ProductWarehouseOutOrderController extends Controller
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
     * Lists all ProductWarehouseOutOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProductWarehouseOutOrder();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductWarehouseOutOrder model.
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
     * Creates a new ProductWarehouseOutOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $model = new ProductWarehouseOutOrder();

        if ($model->load(Yii::$app->request->post())) {//如果成功传过来order_id
            //print_r($model);
            if(!$model->save()){//如果在
                // echo 'fail';

                // var_dump($order_id);
            }else{
                // echo 'add out';
                $order_id = $model->order_id;
                $products = OrderProduct::find()->where(['order_id' => $order_id])->all();
                 //var_dump($products);
                $db = Yii::$app->db;
                $transaction = $db->beginTransaction();//开启事务
                $product_count=0;
                foreach($products as $product){
                    $product_count=$product->product_count;
                    $warehouses = WarehouseProduct::find()->where(['product_id' => $product->product_id])->all();
                    //var_dump($warehouse);
                    
                    foreach ($warehouses as $warehouse) {
                        if($warehouse->product_count > $product_count){//如果当前仓库库存量可以满足要求
                            $warehouse->product_count = $warehouse->product_count-$product_count;
                            $modelOrder = new ProductWarehouseOut();
                            $modelOrder->product_id=$product->product_id;
                            $modelOrder->warehouse_id=$warehouse->warehouse_id;
                            $modelOrder->product_out_orderid = $model->product_out_orderid;
                            $modelOrder->product_out_count = $product_count;
                            $product_count = 0;
                            if($modelOrder->save()){//添加货物出库的详细信息
                                //echo 'warehouse detial success</br>';
                            }else{
                                //echo 'warehouse detial success</br>';
                            }
                            if($warehouse->save()){
                                //echo 'warehouse success</br>';
                                break;
                            }else{
                                //echo 'warehouse fail</br>';
                                break;
                            }
                        }else{//如果当前仓库库存量不能满足要求
                            $product_count = $product_count - $warehouse->product_count;
                            $modelOrder = new ProductWarehouseOut();
                            $modelOrder->product_id=$product->product_id;
                            $modelOrder->warehouse_id=$warehouse->warehouse_id;
                            $modelOrder->product_out_orderid =$model->product_out_orderid;
                            $modelOrder->product_out_count = $warehouse->product_count;
                            $warehouse->product_count = 0;
                            if($modelOrder->save()){//添加货物出库的详细信息
                                //echo 'warehouse changed detial success</br>';
                            }else{
                                //echo 'warehouse changed detial success</br>';
                            }
                            $warehouse->product_count = 0;
                            if($warehouse->save()){
                                //echo 'warehouse changed</br>';
                            }else{
                                //echo 'warehouse changed fail</br>';
                            }
                        }
                    }
                    //判断选择所需货物数量是否为0
                    if($product_count!=0){
                        //说明不能出库，需要调动事务回滚
                        // echo 'product fail</br>';
                        $transaction->rollBack();
                        $str=<<<mark
<script language="javascript" type="text/javascript"> 
            alert("产品数量不足！！！");    
            window.location = 'index.php?r=product-warehouse-out-order/create'    
</script>
mark;
                        echo $str;
                        
                        // $this->redirect(['/material-warehouse-out-order/create']);
                    }          
                }
                if($product_count==0){
                    $order = Orderlist::find()->where(['order_id' => $order_id])->one();
                    $order->order_state=2;
                    if($order->save()){
                        $transaction->commit();
                        $this->redirect(['orderlist/view', 'id'=>$order_id ]);
                    }                   
                }
            }

        } else {
                return $this->render('create', [    
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductWarehouseOutOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->product_out_orderid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductWarehouseOutOrder model.
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
     * Finds the ProductWarehouseOutOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductWarehouseOutOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductWarehouseOutOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
