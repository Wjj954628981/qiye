<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $employee_id
 * @property integer $department_id
 * @property integer $warehouse_id
 * @property string $employee_name
 * @property string $sex
 * @property string $job_name
 * @property string $email
 * @property string $address
 * @property integer $join_time
 *
 * @property Department $department
 * @property Warehouse $warehouse
 * @property PurchaseOrder[] $purchaseOrders
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id', 'department_id', 'warehouse_id', 'join_time'], 'integer'],
            [['employee_name', 'job_name', 'email', 'address'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 5],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'warehouse_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'department_id' => 'Department ID',
            'warehouse_id' => 'Warehouse ID',
            'employee_name' => 'Employee Name',
            'sex' => 'Sex',
            'job_name' => 'Job Name',
            'email' => 'Email',
            'address' => 'Address',
            'join_time' => 'Join Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['warehouse_id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::className(), ['employee_id' => 'employee_id']);
    }
}
