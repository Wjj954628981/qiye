<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_warehouse_in_order".
 *
 * @property integer $material_in_orderid
 * @property integer $employee_id
 * @property integer $material_in_ordertime
 * @property string $material_in_orderremark
 *
 * @property Employee $employee
 */
class MaterialWarehouseInOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_warehouse_in_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_in_orderid'], 'required'],
            [['material_in_orderid', 'employee_id', 'material_in_ordertime'], 'integer'],
            [['material_in_orderremark'], 'string', 'max' => 50],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_in_orderid' => 'Material In Orderid',
            'employee_id' => 'Employee ID',
            'material_in_ordertime' => 'Material In Ordertime',
            'material_in_orderremark' => 'Material In Orderremark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
}
