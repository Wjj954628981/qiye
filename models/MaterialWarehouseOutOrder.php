<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_warehouse_out_order".
 *
 * @property integer $material_out_orderid
 * @property integer $employee_id
 * @property integer $process_id
 * @property integer $material_out_ordertime
 * @property string $material_out_orderremark
 *
 * @property MaterialWarehouseOut[] $materialWarehouseOuts
 * @property Employee $employee
 * @property Process $process
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
            [['employee_id', 'process_id', 'material_out_ordertime'], 'integer'],
            [['material_out_orderremark'], 'string', 'max' => 50],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Process::className(), 'targetAttribute' => ['process_id' => 'process_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_out_orderid' => '物料出库单ID',
            'employee_id' => '负责人ID',
            'process_id' => '流水线ID',
            'material_out_ordertime' => '出库时间',
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
    public function getProcess()
    {
        return $this->hasOne(Process::className(), ['process_id' => 'process_id']);
    }
}
