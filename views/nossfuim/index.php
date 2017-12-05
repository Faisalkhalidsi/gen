<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uim Asms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uim-asm-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Uim Asm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'uim_asm_id',
            'name',
            'free',
            'total',
            'date',
            // 'time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
