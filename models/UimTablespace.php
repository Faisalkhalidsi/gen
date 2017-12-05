<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uim_tablespace".
 *
 * @property integer $uim_tablespace_id
 * @property string $tablespace
 * @property double $total
 * @property double $free
 * @property string $date
 * @property string $time
 */
class UimTablespace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uim_tablespace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tablespace', 'total', 'free', 'date', 'time'], 'required'],
            [['total', 'free'], 'number'],
            [['date', 'time'], 'safe'],
            [['tablespace'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uim_tablespace_id' => 'Uim Tablespace ID',
            'tablespace' => 'Tablespace',
            'total' => 'Total',
            'free' => 'Free',
            'date' => 'Date',
            'time' => 'Time',
        ];
    }
}
