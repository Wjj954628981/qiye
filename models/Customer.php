<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $customer_id
 * @property string $customer_name
 *
 * @property Orderlist[] $orderlists
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id'], 'integer'],
            [['customer_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'customer_name' => 'Customer Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderlists()
    {
        return $this->hasMany(Orderlist::className(), ['customer_id' => 'customer_id']);
    }
}
