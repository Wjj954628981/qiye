<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_warehouse_out".
 *
 * @property integer $product_id
 * @property integer $warehouse_id
 * @property integer $product_out_orderid
 * @property integer $product_out_count
 *
 * @property Product $product
 * @property Warehouse $warehouse
 * @property ProductWarehouseOutOrder $productOutOrder
 */
class ProductWarehouseOut extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_warehouse_out';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'warehouse_id', 'product_out_orderid'], 'required'],
            [['product_id', 'warehouse_id', 'product_out_orderid', 'product_out_count'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'warehouse_id']],
            [['product_out_orderid'], 'exist', 'skipOnError' => true, 'targetClass' => ProductWarehouseOutOrder::className(), 'targetAttribute' => ['product_out_orderid' => 'product_out_orderid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'warehouse_id' => 'Warehouse ID',
            'product_out_orderid' => 'Product Out Orderid',
            'product_out_count' => 'Product Out Count',
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
    public function getProductOutOrder()
    {
        return $this->hasOne(ProductWarehouseOutOrder::className(), ['product_out_orderid' => 'product_out_orderid']);
    }
}
