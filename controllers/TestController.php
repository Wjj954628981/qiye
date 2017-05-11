<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\MaterialWarehouseOutOrder;
use app\models\SearchMaterialWarehouseOutOrder;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TestController extends Controller
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

    public function actionIndex()
    {
        // $query = Yii::$app->db->createCommand('SELECT * FROM material_warehouse_out_order')->queryAll();
        // echo $query->count();
        $query = MaterialWarehouseOutOrder::find(); 
        $test = array('title'=>'title','name'=>'name');
        // $this->render('index',['test'=>$test]);
        return $this->render('index',['title'=>'titleoutside','test'=>$test,'query'=>$query]);
        // return $this->render('index', ['query'=>$query,'test'=>'test']);
        
    }

    protected function findModel($id)
    {
        if (($model = MaterialWarehouseOutOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
