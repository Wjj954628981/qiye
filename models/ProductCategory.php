<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $product_category_id
 * @property string $product_category_name
 *
 * @property Product[] $products
 * @property ProductCategoryKey[] $productCategoryKeys
 * @property ProductCategoryKey[] $productCategoryKeys0
 * @property ProductCategory[] $proProductCategories
 * @property ProductCategory[] $productCategories
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_id'], 'required'],
            [['product_category_id'], 'integer'],
            [['product_category_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_category_id' => 'Product Category ID',
            'product_category_name' => 'Product Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_category_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategoryKeys()
    {
        return $this->hasMany(ProductCategoryKey::className(), ['product_category_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategoryKeys0()
    {
        return $this->hasMany(ProductCategoryKey::className(), ['pro_product_category_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['product_category_id' => 'pro_product_category_id'])->viaTable('product_category_key', ['product_category_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['product_category_id' => 'product_category_id'])->viaTable('product_category_key', ['pro_product_category_id' => 'product_category_id']);
    }
}
