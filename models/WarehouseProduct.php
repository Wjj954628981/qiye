<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse_product".
 *
 * @property integer $product_id
 * @property integer $warehouse_id
 * @property integer $product_count
 *
 * @property Warehouse $warehouse
 * @property Product $product
 */
class WarehouseProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'warehouse_id'], 'required'],
            [['product_id', 'warehouse_id', 'product_count'], 'integer'],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'warehouse_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => '产品ID',
            'warehouse_id' => '仓库ID',
            'product_count' => '产品数量',
        ];
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
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
