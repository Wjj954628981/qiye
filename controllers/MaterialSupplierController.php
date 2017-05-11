<?php

namespace app\controllers;

use Yii;
use app\models\MaterialSupplier;
use app\models\SearchMaterialSupplier;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialSupplierController implements the CRUD actions for MaterialSupplier model.
 */
class MaterialSupplierController extends Controller
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
     * Lists all MaterialSupplier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMaterialSupplier();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialSupplier model.
     * @param integer $supplier_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionView($supplier_id, $material_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($supplier_id, $material_id),
        ]);
    }

    /**
     * Creates a new MaterialSupplier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialSupplier();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaterialSupplier model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $supplier_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionUpdate($supplier_id, $material_id)
    {
        $model = $this->findModel($supplier_id, $material_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'supplier_id' => $model->supplier_id, 'material_id' => $model->material_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaterialSupplier model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $supplier_id
     * @param integer $material_id
     * @return mixed
     */
    public function actionDelete($supplier_id, $material_id)
    {
        $this->findModel($supplier_id, $material_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialSupplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $supplier_id
     * @param integer $material_id
     * @return MaterialSupplier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($supplier_id, $material_id)
    {
        if (($model = MaterialSupplier::findOne(['supplier_id' => $supplier_id, 'material_id' => $material_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
