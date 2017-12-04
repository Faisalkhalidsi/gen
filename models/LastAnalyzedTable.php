<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "last_analyzed_table".
 *
 * @property integer $last_analyzed_table_id
 * @property string $table_name
 * @property string $row_total
 * @property string $date
 * @property string $time
 */
class LastAnalyzedTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'last_analyzed_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_name', 'row_total', 'date', 'time'], 'required'],
            [['date', 'time'], 'safe'],
            [['table_name', 'row_total'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'last_analyzed_table_id' => 'Last Analyzed Table ID',
            'table_name' => 'Table Name',
            'row_total' => 'Row Total',
            'date' => 'Date',
            'time' => 'Time',
        ];
    }
}
