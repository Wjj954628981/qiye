<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase_order".
 *
 * @property integer $purchase_order_id
 * @property integer $employee_id
 * @property integer $purchase_time
 *
 * @property Employee $employee
 * @property PurchaseOrderDetail[] $purchaseOrderDetails
 */
class PurchaseOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'purchase_time'], 'integer'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchase_order_id' => 'Purchase Order ID',
            'employee_id' => 'Employee ID',
            'purchase_time' => 'Purchase Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::className(), ['purchase_order_id' => 'purchase_order_id']);
    }
}
