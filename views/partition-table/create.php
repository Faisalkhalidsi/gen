<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PartitionTable */

$this->title = 'Create Partition Table';
$this->params['breadcrumbs'][] = ['label' => 'Partition Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partition-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
