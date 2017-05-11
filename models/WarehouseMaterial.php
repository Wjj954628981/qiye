<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse_material".
 *
 * @property integer $material_id
 * @property integer $warehouse_id
 * @property integer $material_count
 *
 * @property Warehouse $warehouse
 * @property Material $material
 */
class WarehouseMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'warehouse_id'], 'required'],
            [['material_id', 'warehouse_id', 'material_count'], 'integer'],
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
            'material_id' => '物料ID',
            'warehouse_id' => '仓库ID',
            'material_count' => '物料数量',
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
}
