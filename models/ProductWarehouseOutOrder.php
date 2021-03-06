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

    public $order_id;
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
            [['order_id'], 'required'],
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
            'order_id' => '订单ID',
            'product_out_orderid' => '产品出库单ID',
            'employee_id' => '员工ID',
            'product_out_ordertime' => '出库时间',
            'product_out_orderremark' => '出库备注',
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

    public function beforeSave($insert){
        if($this->isNewRecord){
            //$this->order_id = 1;
            
            // $this->product_out_ordertime = 1;
            $this->product_out_ordertime = strtotime(date('Y-m-d H:i:s'));
            $this->product_out_orderremark = 'test';
        }
        return parent::beforeSave($insert);
    }
}
