<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asm_osm".
 *
 * @property integer $asm_osm_id
 * @property string $name
 * @property integer $total
 * @property integer $free
 * @property string $date
 */
class AsmOsm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asm_osm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'total', 'free', 'date'], 'required'],
            [['total', 'free'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'asm_osm_id' => 'Asm Osm ID',
            'name' => 'Name',
            'total' => 'Total',
            'free' => 'Free',
            'date' => 'Date',
        ];
    }
}
