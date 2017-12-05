<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indihome Status Orders';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indihome-status-order-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <i>*Last Update <?php echo $last_update['date'] ." ".$last_update['time'];?></i>
   <hr>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'indihome_status_order_id',
            'flow',
            'task',
            'queued',
            'status',
//             'date',
//            'time',
//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
