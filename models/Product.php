<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property integer $product_category_id
 * @property string $product_name
 * @property integer $product_price
 *
 * @property OrderProduct[] $orderProducts
 * @property Orderlist[] $orders
 * @property ProductCategory $productCategory
 * @property ProductMaterial[] $productMaterials
 * @property Material[] $materials
 * @property ProductProcess[] $productProcesses
 * @property Process[] $processes
 * @property ProductWarehoueseIn[] $productWarehoueseIns
 * @property ProductWarehouseOut[] $productWarehouseOuts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'product_category_id', 'product_price'], 'integer'],
            [['product_name'], 'string', 'max' => 50],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'product_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_category_id' => 'Product Category ID',
            'product_name' => 'Product Name',
            'product_price' => 'Product Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orderlist::className(), ['order_id' => 'order_id'])->viaTable('order_product', ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['product_category_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductMaterials()
    {
        return $this->hasMany(ProductMaterial::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['material_id' => 'material_id'])->viaTable('product_material', ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProcesses()
    {
        return $this->hasMany(ProductProcess::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesses()
    {
        return $this->hasMany(Process::className(), ['process_id' => 'process_id'])->viaTable('product_process', ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductWarehoueseIns()
    {
        return $this->hasMany(ProductWarehoueseIn::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductWarehouseOuts()
    {
        return $this->hasMany(ProductWarehouseOut::className(), ['product_id' => 'product_id']);
    }

    public static function findByProductName($product_name)
    {
        if(($model = self::find()->where(['product_name' => $product_name])->one())!=NULL){
            return $model;
        }else{
            return NULL;
        }
    }
}
