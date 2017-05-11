<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_category_key".
 *
 * @property integer $product_category_id
 * @property integer $pro_product_category_id
 *
 * @property ProductCategory $productCategory
 * @property ProductCategory $proProductCategory
 */
class ProductCategoryKey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category_key';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_id', 'pro_product_category_id'], 'required'],
            [['product_category_id', 'pro_product_category_id'], 'integer'],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'product_category_id']],
            [['pro_product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['pro_product_category_id' => 'product_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_category_id' => 'Product Category ID',
            'pro_product_category_id' => 'Pro Product Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['product_category_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['product_category_id' => 'pro_product_category_id']);
    }
}
