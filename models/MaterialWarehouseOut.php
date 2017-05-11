<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_warehouse_out".
 *
 * @property integer $material_out_orderid
 * @property integer $warehouse_id
 * @property integer $material_id
 * @property integer $material_out_count
 *
 * @property MaterialWarehouseOutOrder $materialOutOrder
 * @property Warehouse $warehouse
 * @property Material $material
 */
class MaterialWarehouseOut extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_warehouse_out';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_out_orderid', 'warehouse_id', 'material_id'], 'required'],
            [['material_out_orderid', 'warehouse_id', 'material_id', 'material_out_count'], 'integer'],
            [['material_out_orderid'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialWarehouseOutOrder::className(), 'targetAttribute' => ['material_out_orderid' => 'material_out_orderid']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'warehouse_id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'material_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_out_orderid' => '材料出库单ID',
            'warehouse_id' => '仓库ID',
            'material_id' => '材料ID',
            'material_out_count' => '材料数量',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialOutOrder()
    {
        return $this->hasOne(MaterialWarehouseOutOrder::className(), ['material_out_orderid' => 'material_out_orderid']);
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
}
