<?php

namespace app\controllers;

use Yii;
use app\models\MaterialCategoryKey;
use app\models\SearchMaterialCategoryKey;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialCategoryKeyController implements the CRUD actions for MaterialCategoryKey model.
 */
class MaterialCategoryKeyController extends Controller
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
     * Lists all MaterialCategoryKey models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchMaterialCategoryKey();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialCategoryKey model.
     * @param integer $material_category_id
     * @param integer $mat_material_category_id
     * @return mixed
     */
    public function actionView($material_category_id, $mat_material_category_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($material_category_id, $mat_material_category_id),
        ]);
    }

    /**
     * Creates a new MaterialCategoryKey model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialCategoryKey();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'material_category_id' => $model->material_category_id, 'mat_material_category_id' => $model->mat_material_category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaterialCategoryKey model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $material_category_id
     * @param integer $mat_material_category_id
     * @return mixed
     */
    public function actionUpdate($material_category_id, $mat_material_category_id)
    {
        $model = $this->findModel($material_category_id, $mat_material_category_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'material_category_id' => $model->material_category_id, 'mat_material_category_id' => $model->mat_material_category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaterialCategoryKey model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $material_category_id
     * @param integer $mat_material_category_id
     * @return mixed
     */
    public function actionDelete($material_category_id, $mat_material_category_id)
    {
        $this->findModel($material_category_id, $mat_material_category_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialCategoryKey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $material_category_id
     * @param integer $mat_material_category_id
     * @return MaterialCategoryKey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($material_category_id, $mat_material_category_id)
    {
        if (($model = MaterialCategoryKey::findOne(['material_category_id' => $material_category_id, 'mat_material_category_id' => $mat_material_category_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
