<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_material".
 *
 * @property integer $product_id
 * @property integer $material_id
 *
 * @property Product $product
 * @property Material $material
 */
class ProductMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'material_id'], 'required'],
            [['product_id', 'material_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'material_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'material_id' => 'Material ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['material_id' => 'material_id']);
    }
}
