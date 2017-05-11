<?php

namespace app\models;

use Yii;
use yii\web\HttpException;

/**
 * This is the model class for table "material".
 *
 * @property integer $material_id
 * @property integer $material_category_id
 * @property string $material_name
 * @property integer $material_min
 *
 * @property MaterialCategory $materialCategory
 * @property MaterialSupplier[] $materialSuppliers
 * @property Supplier[] $suppliers
 * @property MaterialWarehouseIn[] $materialWarehouseIns
 * @property Warehouse[] $warehouses
 * @property MaterialWarehouseOut[] $materialWarehouseOuts
 * @property Warehouse[] $warehouses0
 * @property ProcessMaterial[] $processMaterials
 * @property Process[] $processes
 * @property ProductMaterial[] $productMaterials
 * @property Product[] $products
 * @property PurchaseMaterial $purchaseMaterial
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id'], 'required'],
            [['material_id', 'material_category_id', 'material_min'], 'integer'],
            [['material_name'], 'string', 'max' => 50],
            [['material_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialCategory::className(), 'targetAttribute' => ['material_category_id' => 'material_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => '货物ID',
            'material_category_id' => '货物种类',
            'material_name' => '货物名称',
            'material_min' => '最小货物量',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategory()
    {
        return $this->hasOne(MaterialCategory::className(), ['material_category_id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialSuppliers()
    {
        return $this->hasMany(MaterialSupplier::className(), ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['supplier_id' => 'supplier_id'])->viaTable('material_supplier', ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialWarehouseIns()
    {
        return $this->hasMany(MaterialWarehouseIn::className(), ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouse::className(), ['warehouse_id' => 'warehouse_id'])->viaTable('material_warehouse_in', ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialWarehouseOuts()
    {
        return $this->hasMany(MaterialWarehouseOut::className(), ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses0()
    {
        return $this->hasMany(Warehouse::className(), ['warehouse_id' => 'warehouse_id'])->viaTable('material_warehouse_out', ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessMaterials()
    {
        return $this->hasMany(ProcessMaterial::className(), ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesses()
    {
        return $this->hasMany(Process::className(), ['process_id' => 'process_id'])->viaTable('process_material', ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductMaterials()
    {
        return $this->hasMany(ProductMaterial::className(), ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'product_id'])->viaTable('product_material', ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseMaterial()
    {
        return $this->hasOne(PurchaseMaterial::className(), ['material_id' => 'material_id']);
    }

    public static function findByMaterialName($material_name)
    {
        if(($model = self::find()->where(['material_name' => $material_name])->one())!=NULL){
            return $model;
        }else{
            if(Product::findByProductName($material_name)==NULL){
                throw new HttpException(400,"名称不存在");
                
            }
        }
        
    }
}
