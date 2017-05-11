<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $warehouse_id
 * @property string $warehouse_name
 * @property string $location
 * @property integer $max
 *
 * @property Employee[] $employees
 * @property MaterialWarehouseIn[] $materialWarehouseIns
 * @property MaterialWarehouseOut[] $materialWarehouseOuts
 * @property ProductWarehoueseIn[] $productWarehoueseIns
 * @property ProductWarehouseOut[] $productWarehouseOuts
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id'], 'required'],
            [['warehouse_id', 'max'], 'integer'],
            [['warehouse_name', 'location'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'warehouse_id' => '仓库ID',
            'warehouse_name' => '仓库名',
            'location' => '位置',
            'max' => '最大数量',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['warehouse_id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialWarehouseIns()
    {
        return $this->hasMany(MaterialWarehouseIn::className(), ['warehouse_id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialWarehouseOuts()
    {
        return $this->hasMany(MaterialWarehouseOut::className(), ['warehouse_id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductWarehoueseIns()
    {
        return $this->hasMany(ProductWarehoueseIn::className(), ['warehouse_id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductWarehouseOuts()
    {
        return $this->hasMany(ProductWarehouseOut::className(), ['warehouse_id' => 'warehouse_id']);
    }

    public static function findByWarehouseId($warehouse_id)
    {
        if(($model = self::find()->where(['warehouse_id' => $warehouse_id])->one())!=NULL){
            return $model;
        }else{
            throw new HttpException(400,"名称不存在");
        }
    }
}
