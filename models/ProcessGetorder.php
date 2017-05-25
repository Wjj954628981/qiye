<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "process_getorder".
 *
 * @property integer $process_getorderid
 * @property integer $process_id
 * @property integer $process_getordertime
 *
 * @property Process $process
 * @property ProcessGetorderDetail[] $processGetorderDetails
 */
class ProcessGetorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'process_getorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['process_getorderid'], 'required'],
            [['process_getorderid', 'process_id', 'process_getordertime'], 'integer'],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Process::className(), 'targetAttribute' => ['process_id' => 'process_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'process_getorderid' => '领料单ID',
            'process_id' => '流水线ID',
            'process_getordertime' => '领料单下单时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcess()
    {
        return $this->hasOne(Process::className(), ['process_id' => 'process_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessGetorderDetails()
    {
        return $this->hasMany(ProcessGetorderDetail::className(), ['process_getorderid' => 'process_getorderid']);
    }
}
