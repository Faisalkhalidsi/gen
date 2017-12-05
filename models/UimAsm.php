<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uim_asm".
 *
 * @property integer $uim_asm_id
 * @property string $name
 * @property double $free
 * @property double $total
 * @property string $date
 * @property string $time
 */
class UimAsm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uim_asm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'free', 'total', 'date', 'time'], 'required'],
            [['free', 'total'], 'number'],
            [['date', 'time'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uim_asm_id' => 'Uim Asm ID',
            'name' => 'Name',
            'free' => 'Free',
            'total' => 'Total',
            'date' => 'Date',
            'time' => 'Time',
        ];
    }
}
