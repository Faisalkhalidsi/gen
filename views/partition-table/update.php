<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PartitionTable */

$this->title = 'Update Partition Table: ' . $model->partition_table_id;
$this->params['breadcrumbs'][] = ['label' => 'Partition Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->partition_table_id, 'url' => ['view', 'id' => $model->partition_table_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partition-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
