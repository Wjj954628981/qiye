<?php

namespace app\controllers;

use Yii;
use app\models\MaterialWarehouseOut;
use app\models\ProcessGetorder;
use app\models\ProcessGetorderDetail;
use app\models\MaterialWarehouseOutOrder;
use app\models\SearchMaterialWarehouseOutOrder;
use app\models\ProductWarehouseOutOrder;
use app\models\SearchProductWarehouseOutOrder;
use app\models\WarehouseMaterial;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialWarehouseOutOrderController implements the CRUD actions for MaterialWarehouseOutOrder model.
 */
class MaterialWarehouseOutOrderController extends Controller
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
     * Lists all MaterialWarehouseOutOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelMaterialWarehouseOutOrder = new SearchMaterialWarehouseOutOrder();
        $dataProviderMaterialWarehouseOutOrder = $searchModelMaterialWarehouseOutOrder->search(Yii::$app->request->queryParams);
        $dataProviderMaterialWarehouseOutOrder->Pagination->defaultPageSize = 5;

        $searchModelProductWarehouseOutOrder = new SearchProductWarehouseOutOrder();
        $dataProviderProductWarehouseOutOrder = $searchModelProductWarehouseOutOrder->search(Yii::$app->request->queryParams);
        $dataProviderProductWarehouseOutOrder->Pagination->defaultPageSize = 5;

        return $this->render('index', [
            'searchModelMaterialWarehouseOutOrder' => $searchModelMaterialWarehouseOutOrder,
            'dataProviderMaterialWarehouseOutOrder' => $dataProviderMaterialWarehouseOutOrder,

            'searchModelProductWarehouseOutOrder' => $searchModelProductWarehouseOutOrder,
            'dataProviderProductWarehouseOutOrder' => $dataProviderProductWarehouseOutOrder,
        ]);
    }

    /**
     * Displays a single MaterialWarehouseOutOrder model.
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
     * Creates a new MaterialWarehouseOutOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($process_getorderid)
    {
            return $this->render('create', [
                'process_getorderid' => $process_getorderid,
            ]);
    }

    /**
     * Updates an existing MaterialWarehouseOutOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->material_out_orderid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaterialWarehouseOutOrder model.
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
     * Finds the MaterialWarehouseOutOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialWarehouseOutOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialWarehouseOutOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAdd(){
        $employee_id=Yii::$app->request->post('employee_id');
        $material_outorder_remark=Yii::$app->request->post('material_outorder_remark');
        $process_getorderid=Yii::$app->request->post('process_getorderid');

        $processGetOrder = ProcessGetorder::find()->where(['process_getorderid'=>$process_getorderid])->one();
        $processGetOrderDetails = ProcessGetorderDetail::find()->where(['process_getorderid'=>$process_getorderid])->all();
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        $model = new MaterialWarehouseOutOrder();
        $model->material_out_orderid = null;
        $model->employee_id = $employee_id;
        $model->process_id = $processGetOrder['process_id'];
        $model->material_out_ordertime = time();
        $model->material_out_orderremark = $material_outorder_remark;
        $model->save(false);
        // $material_count = 5;
        foreach ($processGetOrderDetails as $processGetOrderDetail) {
            $warehouses = WarehouseMaterial::find()->where(['material_id'=>$processGetOrderDetail->material_id])->all();
            $material_count = $processGetOrderDetail->material_count;
            foreach ($warehouses as $warehouse) {
                if($warehouse->material_count >=$material_count){
                    $warehouse->material_count = $warehouse->material_count-$processGetOrderDetail->material_count;
                    $warehouse_id = $warehouse['warehouse_id'];
                    $modeldetail = new MaterialWarehouseOut();
                    $modeldetail->material_out_orderid = $model->material_out_orderid;
                    $modeldetail->warehouse_id =$warehouse_id ;
                    $modeldetail->material_id = (int)$processGetOrderDetail['material_id'];
                    $modeldetail->material_out_count = (int)$processGetOrderDetail['material_count'];
                    $modeldetail->save(false);
                    $warehouse->save(false);
                    $processGetOrderDetail->delete(['process_getorderid'=>$process_getorderid]);
                    $material_count = 0;
                    break;
                }else{
                    $material_count = $material_count-$warehouse->material_count;
                    $warehouse->material_count = 0;
                    $modeldetail = new MaterialWarehouseOut();
                    $modeldetail->material_out_orderid = $model->material_out_orderid;
                    $modeldetail->warehouse_id =$warehouse_id ;
                    $modeldetail->material_id = (int)$processGetOrderDetail['material_id'];
                    $modeldetail->material_out_count = (int)$processGetOrderDetail['material_count'];
                    $modeldetail->save(false);
                    $warehouse->save(false);
                }
            }
            if($material_count!=0){
                
                $str=<<<mark
                <script language="javascript" type="text/javascript"> 
                        alert("!!!!!!!!!!!!!!!");    
                        window.location = 'index.php?r=material-warehouse-out-order/create'    
                </script>
mark;
                echo $str; 
                $transaction->rollBack();
             }
        }
        // if($material_count==0){
        $transaction->commit();
        $processGetOrder->delete(['process_getorderid'=>$process_getorderid]);
        return $this->redirect(['view','id'=>$model['material_out_orderid']]); 
        // }
    }
}
