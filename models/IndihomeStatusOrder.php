<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indihome_status_order".
 *
 * @property integer $indihome_status_order_id
 * @property string $flow
 * @property string $task
 * @property integer $queued
 * @property string $status
 * @property string $date
 * @property string $time
 */
class IndihomeStatusOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indihome_status_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flow', 'task', 'queued', 'status', 'date', 'time'], 'required'],
            [['queued'], 'integer'],
            [['date', 'time'], 'safe'],
            [['flow', 'task', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'indihome_status_order_id' => 'Indihome Status Order ID',
            'flow' => 'Flow',
            'task' => 'Task',
            'queued' => 'Queued',
            'status' => 'Status',
            'date' => 'Date',
            'time' => 'Last Update',
        ];
    }
}
