<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uim_active_session".
 *
 * @property integer $uim_active_session_id
 * @property string $machine
 * @property integer $session_total
 * @property string $date
 * @property string $time
 */
class UimActiveSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uim_active_session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['machine', 'session_total', 'date', 'time'], 'required'],
            [['session_total'], 'integer'],
            [['date', 'time'], 'safe'],
            [['machine'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uim_active_session_id' => 'Uim Active Session ID',
            'machine' => 'Machine',
            'session_total' => 'Session Total',
            'date' => 'Date',
            'time' => 'Time',
        ];
    }
}
