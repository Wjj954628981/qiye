<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_category_key".
 *
 * @property integer $material_category_id
 * @property integer $mat_material_category_id
 *
 * @property MaterialCategory $materialCategory
 * @property MaterialCategory $matMaterialCategory
 */
class MaterialCategoryKey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_category_key';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_category_id', 'mat_material_category_id'], 'required'],
            [['material_category_id', 'mat_material_category_id'], 'integer'],
            [['material_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialCategory::className(), 'targetAttribute' => ['material_category_id' => 'material_category_id']],
            [['mat_material_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialCategory::className(), 'targetAttribute' => ['mat_material_category_id' => 'material_category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_category_id' => 'Material Category ID',
            'mat_material_category_id' => 'Mat Material Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategory()
    {
        return $this->hasOne(MaterialCategory::className(), ['material_category_id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatMaterialCategory()
    {
        return $this->hasOne(MaterialCategory::className(), ['material_category_id' => 'mat_material_category_id']);
    }
}
