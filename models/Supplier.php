<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $supplier_id
 * @property string $company_name
 * @property string $address
 * @property integer $telephone
 *
 * @property MaterialSupplier[] $materialSuppliers
 * @property Material[] $materials
 * @property PurchaseOrderDetail[] $purchaseOrderDetails
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id'], 'required'],
            [['supplier_id', 'telephone'], 'integer'],
            [['company_name', 'address'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Supplier ID',
            'company_name' => 'Company Name',
            'address' => 'Address',
            'telephone' => 'Telephone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialSuppliers()
    {
        return $this->hasMany(MaterialSupplier::className(), ['supplier_id' => 'supplier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['material_id' => 'material_id'])->viaTable('material_supplier', ['supplier_id' => 'supplier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::className(), ['supplier_id' => 'supplier_id']);
    }
}
