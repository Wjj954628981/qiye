<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_warehouse_in".
 *
 * @property integer $warehouse_id
 * @property integer $material_id
 * @property integer $material_in_orderid
 * @property integer $material_in_count
 *
 * @property Warehouse $warehouse
 * @property Material $material
 * @property MaterialWarehouseInOrder $materialInOrder
 */
class MaterialWarehouseIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_warehouse_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id', 'material_id', 'material_in_orderid'], 'required'],
            [['warehouse_id', 'material_id', 'material_in_orderid', 'material_in_count'], 'integer'],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'warehouse_id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'material_id']],
            [['material_in_orderid'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialWarehouseInOrder::className(), 'targetAttribute' => ['material_in_orderid' => 'material_in_orderid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'warehouse_id' => '仓库ID',
            'material_id' => '物料ID',
            'material_in_orderid' => '材料入库单ID',
            'material_in_count' => '材料数量',
        ];
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
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialInOrder()
    {
        return $this->hasOne(MaterialWarehouseInOrder::className(), ['material_in_orderid' => 'material_in_orderid']);
    }
}
