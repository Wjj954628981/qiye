<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase_order_detail".
 *
 * @property integer $supplier_id
 * @property integer $material_id
 * @property integer $purchase_order_id
 * @property integer $material_count
 *
 * @property Supplier $supplier
 * @property Material $material
 * @property PurchaseOrder $purchaseOrder
 */
class PurchaseOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'material_id', 'purchase_order_id'], 'required'],
            [['supplier_id', 'material_id', 'purchase_order_id', 'material_count'], 'integer'],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'supplier_id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'material_id']],
            [['purchase_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => PurchaseOrder::className(), 'targetAttribute' => ['purchase_order_id' => 'purchase_order_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Supplier ID',
            'material_id' => 'Material ID',
            'purchase_order_id' => 'Purchase Order ID',
            'material_count' => 'Material Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['supplier_id' => 'supplier_id']);
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
    public function getPurchaseOrder()
    {
        return $this->hasOne(PurchaseOrder::className(), ['purchase_order_id' => 'purchase_order_id']);
    }
}
