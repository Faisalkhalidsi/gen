<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartitionTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partition-table-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partition_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_total')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
