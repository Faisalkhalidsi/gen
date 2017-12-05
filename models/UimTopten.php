<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uim_topten".
 *
 * @property integer $uim_topten_id
 * @property string $table_name
 * @property integer $row_total
 * @property string $last_analyzed
 */
class UimTopten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uim_topten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_name', 'row_total', 'last_analyzed'], 'required'],
            [['row_total'], 'integer'],
            [['last_analyzed'], 'safe'],
            [['table_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uim_topten_id' => 'Uim Topten ID',
            'table_name' => 'Table Name',
            'row_total' => 'Row Total',
            'last_analyzed' => 'Last Analyzed',
        ];
    }
}
