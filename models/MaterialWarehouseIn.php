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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'warehouse_id' => 'Warehouse ID',
            'material_id' => 'Material ID',
            'material_in_orderid' => 'Material In Orderid',
            'material_in_count' => 'Material In Count',
        ];
    }
}
