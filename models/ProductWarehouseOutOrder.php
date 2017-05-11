<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_warehouse_out_order".
 *
 * @property integer $product_out_orderid
 * @property integer $employee_id
 * @property integer $product_out_ordertime
 * @property string $product_out_orderremark
 *
 * @property ProductWarehouseOut[] $productWarehouseOuts
 * @property Employee $employee
 */
class ProductWarehouseOutOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_warehouse_out_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_out_orderid'], 'required'],
            [['product_out_orderid', 'employee_id', 'product_out_ordertime'], 'integer'],
            [['product_out_orderremark'], 'string', 'max' => 50],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_out_orderid' => 'Product Out Orderid',
            'employee_id' => 'Employee ID',
            'product_out_ordertime' => 'Product Out Ordertime',
            'product_out_orderremark' => 'Product Out Orderremark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductWarehouseOuts()
    {
        return $this->hasMany(ProductWarehouseOut::className(), ['product_out_orderid' => 'product_out_orderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
}
