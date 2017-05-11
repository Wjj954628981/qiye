<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_category".
 *
 * @property integer $material_category_id
 * @property string $material_category_name
 *
 * @property Material[] $materials
 * @property MaterialCategoryKey[] $materialCategoryKeys
 * @property MaterialCategoryKey[] $materialCategoryKeys0
 * @property MaterialCategory[] $matMaterialCategories
 * @property MaterialCategory[] $materialCategories
 */
class MaterialCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_category_id'], 'required'],
            [['material_category_id'], 'integer'],
            [['material_category_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_category_id' => 'Material Category ID',
            'material_category_name' => 'Material Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['material_category_id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategoryKeys()
    {
        return $this->hasMany(MaterialCategoryKey::className(), ['material_category_id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategoryKeys0()
    {
        return $this->hasMany(MaterialCategoryKey::className(), ['mat_material_category_id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatMaterialCategories()
    {
        return $this->hasMany(MaterialCategory::className(), ['material_category_id' => 'mat_material_category_id'])->viaTable('material_category_key', ['material_category_id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategories()
    {
        return $this->hasMany(MaterialCategory::className(), ['material_category_id' => 'material_category_id'])->viaTable('material_category_key', ['mat_material_category_id' => 'material_category_id']);
    }
}
