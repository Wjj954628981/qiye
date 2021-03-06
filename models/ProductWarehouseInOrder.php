<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_warehouse_in_order".
 *
 * @property integer $product_in_orderid
 * @property integer $employee_id
 * @property integer $product_in_ordertime
 * @property string $product_in_orderremark
 *
 * @property ProductWarehouseIn[] $productWarehouseIns
 * @property Employee $employee
 */
class ProductWarehouseInOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_warehouse_in_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'product_in_ordertime'], 'integer'],
            [['product_in_orderremark'], 'string', 'max' => 50],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_in_orderid' => '产品入库单ID',
            'employee_id' => '员工ID',
            'product_in_ordertime' => '入库时间',
            'product_in_orderremark' => '入库备注',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductWarehouseIns()
    {
        return $this->hasMany(ProductWarehouseIn::className(), ['product_in_orderid' => 'product_in_orderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
}
