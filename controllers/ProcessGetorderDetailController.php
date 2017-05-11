<?php

namespace app\controllers;

use Yii;
use app\models\ProcessGetorderDetail;
use app\models\SearchProcessGetorderDetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProcessGetorderDetailController implements the CRUD actions for ProcessGetorderDetail model.
 */
class ProcessGetorderDetailController extends Controller
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
     * Lists all ProcessGetorderDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProcessGetorderDetail();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProcessGetorderDetail model.
     * @param integer $process_getorderid
     * @param integer $material_id
     * @return mixed
     */
    public function actionView($process_getorderid, $material_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($process_getorderid, $material_id),
        ]);
    }

    /**
     * Creates a new ProcessGetorderDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProcessGetorderDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'process_getorderid' => $model->process_getorderid, 'material_id' => $model->material_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProcessGetorderDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $process_getorderid
     * @param integer $material_id
     * @return mixed
     */
    public function actionUpdate($process_getorderid, $material_id)
    {
        $model = $this->findModel($process_getorderid, $material_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'process_getorderid' => $model->process_getorderid, 'material_id' => $model->material_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProcessGetorderDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $process_getorderid
     * @param integer $material_id
     * @return mixed
     */
    public function actionDelete($process_getorderid, $material_id)
    {
        $this->findModel($process_getorderid, $material_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProcessGetorderDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $process_getorderid
     * @param integer $material_id
     * @return ProcessGetorderDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($process_getorderid, $material_id)
    {
        if (($model = ProcessGetorderDetail::findOne(['process_getorderid' => $process_getorderid, 'material_id' => $material_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
