<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_product".
 *
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $product_count
 *
 * @property Orderlist $order
 * @property Product $product
 */
class OrderProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id'], 'required'],
            [['order_id', 'product_id', 'product_count'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orderlist::className(), 'targetAttribute' => ['order_id' => 'order_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'product_count' => 'Product Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orderlist::className(), ['order_id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
}
