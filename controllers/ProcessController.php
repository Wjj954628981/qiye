<?php

namespace app\controllers;

use Yii;
use app\models\Process;
use app\models\SearchProcess;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProcessController implements the CRUD actions for Process model.
 */
class ProcessController extends Controller
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
     * Lists all Process models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProcess();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Process model.
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
     * Creates a new Process model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Process();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->process_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Process model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->process_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Process model.
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
     * Finds the Process model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Process the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Process::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function findMaterial($product_id){
        $sql = "SELECT m.material_id FROM material AS m,product_material AS pm,product AS p 
                    WHERE (
                            p.product_id=: productid AND
                            p.product_id = pm.product_id AND
                            m.material_id = pm.material_id  )";
        $material = yii::$app->db->createCommand($sql)->bindValue(':productid', $product_id)->queryAll();
        
        return $material;
    }

    public function findProcess($product_id, $product_count){
        $process_id = Yii::$app->db->createCommand("select process_id from product_process where product_id=: product_id")
                        ->bindValue(':product_id', $product_id)
                        ->queryOne();

        $material = findMaterial($product_id);

        Yii::app()->db->createCommand()->insert('process_getorder',  array("process_id" => $process_id));
        $process_getorderid = Yii::app()->db->createCommand("select process_getorderid from process_getorder order by process_getorderid desc")
                ->queryOne();

        for($i = 0; $i < count($material); $i++){
            $material_count = material[$i]->material_count;
            $material_id = material[$i]->material_id;
            Yii::app()->db->createCommand()->insert('process_getorder_detail',   
                array(  
                'material_id' => $material_id,
                'process_getorderid' => $process_getorderid,
                'material_count' => $material_count * $product_count
            ));
        }
    }

    public function processMaterial($process_id){
        $process_getorderid = Yii::app()->db->createCommand("select process_getorderid from process_getorder where process_id=: process_id order by process_getordertime desc")
            ->bindValue(":process_id", $process_id)
            ->queryOne();

        $material = Yii::app()->db->createCommand("select material_id, material_count from process_getorder_detail where process_getorderid=: process_getorderid")
            ->bindValue(":process_getorderid", $process_getorderid)
            ->queryOne();

        return $this->render('processMaterial', ["material" => $material]);
    }
}
