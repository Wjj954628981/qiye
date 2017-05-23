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
 * @property MaterialWarehouseIn[] $materialWarehouseIns
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
            [['employee_id', 'material_in_ordertime'], 'integer'],
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
            'material_in_orderid' => '材料入库单ID',
            'employee_id' => '员工ID',
            'material_in_ordertime' => '入库时间',
            'material_in_orderremark' => '入库备注',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialWarehouseIns()
    {
        return $this->hasMany(MaterialWarehouseIn::className(), ['material_in_orderid' => 'material_in_orderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }
}
