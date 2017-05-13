<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderlist".
 *
 * @property integer $order_id
 * @property integer $customer_id
 * @property integer $purchase_time
 * @property integer $duetime
 * @property string $person_name
 * @property integer $telephone
 * @property integer $order_state
 *
 * @property OrderProduct[] $orderProducts
 * @property Product[] $products
 * @property Customer $customer
 */
class Orderlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'customer_id', 'purchase_time', 'duetime', 'telephone', 'order_state'], 'integer'],
            [['person_name'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => '订单ID',
            'customer_id' => '顾客ID',
            'purchase_time' => '下单时间',
            'duetime' => '截止日期',
            'person_name' => '用户名',
            'telephone' => '联系',
            'order_state' => '订单状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'product_id'])->viaTable('order_product', ['order_id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }
}
