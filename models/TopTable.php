<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "top_table".
 *
 * @property integer $top_table_id
 * @property string $table_name
 * @property string $row_total
 * @property string $date
 */
class TopTable extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'top_table';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['row_total', 'date'], 'required'],
            [['date'], 'safe'],
            [['table_name', 'row_total'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'top_table_id' => 'Top Table ID',
            'table_name' => 'Top Table Table Name',
            'row_total' => 'Row Total',
            'date' => 'Date',
        ];
    }

}
