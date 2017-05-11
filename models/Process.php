<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "process".
 *
 * @property integer $process_id
 * @property string $description
 * @property integer $cost
 *
 * @property ProcessGetorder[] $processGetorders
 * @property ProductProcess[] $productProcesses
 * @property Product[] $products
 */
class Process extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'process';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['process_id'], 'required'],
            [['process_id', 'cost'], 'integer'],
            [['description'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'process_id' => 'Process ID',
            'description' => 'Description',
            'cost' => 'Cost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessGetorders()
    {
        return $this->hasMany(ProcessGetorder::className(), ['process_id' => 'process_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProcesses()
    {
        return $this->hasMany(ProductProcess::className(), ['process_id' => 'process_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'product_id'])->viaTable('product_process', ['process_id' => 'process_id']);
    }
}
