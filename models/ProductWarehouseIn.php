<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_warehouse_in".
 *
 * @property integer $product_id
 * @property integer $product_in_orderid
 * @property integer $warehouse_id
 * @property integer $product_in_count
 *
 * @property Product $product
 * @property Warehouse $warehouse
 * @property ProductWarehouseInOrder $productInOrder
 */
class ProductWarehouseIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_warehouse_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_in_orderid', 'warehouse_id'], 'required'],
            [['product_id', 'product_in_orderid', 'warehouse_id', 'product_in_count'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'warehouse_id']],
            [['product_in_orderid'], 'exist', 'skipOnError' => true, 'targetClass' => ProductWarehouseInOrder::className(), 'targetAttribute' => ['product_in_orderid' => 'product_in_orderid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_in_orderid' => 'Product In Orderid',
            'warehouse_id' => 'Warehouse ID',
            'product_in_count' => 'Product In Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['warehouse_id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductInOrder()
    {
        return $this->hasOne(ProductWarehouseInOrder::className(), ['product_in_orderid' => 'product_in_orderid']);
    }
}
