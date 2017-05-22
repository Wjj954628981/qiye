<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "process_getorder_detail".
 *
 * @property integer $process_getorderid
 * @property integer $material_id
 * @property integer $material_count
 *
 * @property ProcessGetorder $processGetorder
 * @property Material $material
 */
class ProcessGetorderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'process_getorder_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['process_getorderid', 'material_id'], 'required'],
            [['process_getorderid', 'material_id', 'material_count'], 'integer'],
            [['process_getorderid'], 'exist', 'skipOnError' => true, 'targetClass' => ProcessGetorder::className(), 'targetAttribute' => ['process_getorderid' => 'process_getorderid']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'material_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'process_getorderid' => '领料单ID',
            'material_id' => '材料ID',
            'material_count' => '材料数量',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessGetorder()
    {
        return $this->hasOne(ProcessGetorder::className(), ['process_getorderid' => 'process_getorderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['material_id' => 'material_id']);
    }
}
