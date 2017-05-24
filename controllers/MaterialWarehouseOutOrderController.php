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


        $process_id = ProcessGetorder::find()->select(['process_id'])->where(['process_getorderid'=>$process_getorderid])->all();
        $messages = ProcessGetorderDetail::find()->select('material_id','material_out_count')->where(['process_getorderid'=>$process_getorderid])->all();

        $model = new MaterialWarehouseOutOrder();
        $model->material_out_orderid = null;
        $model->employee_id = $employee_id;
        $model->process_id = (int)$process_id;
        $model->material_out_ordertime = time();
        $model->material_out_orderremark = $material_outorder_remark;

        if($model->save()>0){
            foreach ($messages as $message) {
                $modeldetail = new MaterialWarehouseOut();
                $modeldetail->material_out_orderid = $model->material_out_orderid;
                // $modeldetail->warehouse_id = ;
                $modeldetail->material_id = (int)$message['material_id'];
                $modeldetail->material_out_count = (int)$message['material_out_count'];
                $modeldetail->save();
            }
        }
        return $this->redirect(['view','id'=>$model->material_out_orderid]);
    }
}
