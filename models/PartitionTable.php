<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partition_table".
 *
 * @property integer $partition_table_id
 * @property string $partition_id
 * @property integer $order_total
 * @property string $date
 * @property string $time
 */
class PartitionTable extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'partition_table';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['partition_id','order_total', 'date', 'time'], 'required'],
            [['order_total'], 'integer'],
            [['date', 'time'], 'safe'],
            [['partition_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'partition_table_id' => 'Partition Table ID',
            'partition_id' => 'Partition ID',
            'order_total' => 'Order Total',
            'date' => 'Date',
            'time' => 'Time',
        ];
    }

}
