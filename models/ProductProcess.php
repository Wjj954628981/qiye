<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_process".
 *
 * @property integer $product_id
 * @property integer $process_id
 *
 * @property Product $product
 * @property Process $process
 */
class ProductProcess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_process';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'process_id'], 'required'],
            [['product_id', 'process_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Process::className(), 'targetAttribute' => ['process_id' => 'process_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'process_id' => 'Process ID',
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
    public function getProcess()
    {
        return $this->hasOne(Process::className(), ['process_id' => 'process_id']);
    }
}
