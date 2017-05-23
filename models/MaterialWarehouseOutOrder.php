<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_warehouse_out_order".
 *
 * @property integer $material_out_orderid
 * @property integer $employee_id
 * @property integer $department_id
 * @property integer $material_out_ordertime
 * @property integer $material_out_orderstate
 * @property string $material_out_orderremark
 *
 * @property MaterialWarehouseOut[] $materialWarehouseOuts
 * @property Employee $employee
 * @property Department $department
 */
class MaterialWarehouseOutOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_warehouse_out_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'department_id', 'material_out_ordertime', 'material_out_orderstate'], 'integer'],
            [['material_out_orderremark'], 'string', 'max' => 50],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_out_orderid' => '材料出库单ID',
            'employee_id' => '员工ID',
            'department_id' => '部门ID',
            'material_out_ordertime' => '出库时间',
            'material_out_orderstate' => '出库状态',
            'material_out_orderremark' => '出库备注',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialWarehouseOuts()
    {
        return $this->hasMany(MaterialWarehouseOut::className(), ['material_out_orderid' => 'material_out_orderid']);
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
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }
}
