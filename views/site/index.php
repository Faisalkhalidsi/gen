<?php
/* @var $this yii\web\View */
$this->title = 'Simple Dashboard';

use miloschuman\highcharts\Highcharts;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

//use kartik\growl\Growl;

$this->title = 'OSM';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
    <div class="body-content">


        <h3>OSM Monitoring</h3>

        <hr>
        <?php
        $form = ActiveForm::begin([
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => true,
                    'id' => 'osmForm'
        ]);
        ?>
        <div class="row">
            <div class="col-lg-6 tobeRounded">
                <div class="row">
                    <div class="col-sm-9" style="padding-left: 50px">
                        <?php
                        //dropdown list
                        echo $form->field($modelPartition, 'partition_id')
                                ->dropDownList(ArrayHelper::map(\app\models\PartitionTable::find()->all(), 'partition_id', 'partition_id'), ['prompt' => 'All']);

                        echo DatePicker::widget([
                            'name' => 'from_date',
                            'id' => 'Partition',
                            'value' => date("Y-m-d", strtotime("-1 days")),
                            'type' => DatePicker::TYPE_RANGE,
                            'name2' => 'to_date',
                            'value2' => date("Y-m-d"),
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-d'
                            ]
                        ]);
                        ?>
                    </div>

                    <div class="col-sm-1" style="padding-top: 25px;">
                        <?php
                        echo Html::button('Show', [
                            'class' => 'btn btn-primary',
                            'onclick' => 'partitionProcess();'
                        ]);
                        ?>
                    </div>
                </div>
                <hr>
                <br>
                <?php ?>
                <div id="partitionTable">
                    <?php
                    foreach ($diagram as $values) {
                        $c[] = "Partition ID";
                        $b[] = array('type' => 'column',
                            'name' => "Partition Id : " . $values['partition_id'],
                            'data' => array((int) $values['order_total']));
                    }
                    echo Highcharts::widget([
                        'id' => 'partitionChart',
                        'options' => [
                            'chart' => [
                                'type' => 'colomn',
                                'height' => '200',
                                'width' => '500'
                            ],
                            'title' => ['text' => ''],
                            'xAxis' => [
                                'categories' => $c
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'Order Total']
                            ],
                            'series' => $b,
                            'legend' => 'disable',
                            'credits' => 'false'
                        ]
                    ]);
                    ?>
                </div>
            </div>
            <div id="spacer"></div>
            <div class="col-lg-6 tobeRounded">
                <div class="row">
                    <div class="col-sm-9" style="padding-left: 50px">
                        <?php
                        //dropdown list
                        $modelTopten = new \app\models\TopTable();
                        echo $form->field($modelTopten, 'table_name')
                                ->dropDownList(ArrayHelper::map(\app\models\TopTable::find()->all(), 'table_name', 'table_name'), ['prompt' => 'All']);

                        echo DatePicker::widget([
                            'name' => 'from_date',
                            'id' => 'topten',
                            'value' => date("Y-m-d", strtotime("-1 days")),
                            'type' => DatePicker::TYPE_RANGE,
                            'name2' => 'to_date',
                            'value2' => date("Y-m-d"),
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-d'
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="col-sm-1" style="padding-top: 25px;">
                        <?php
                        echo Html::button('Show', [
                            'class' => 'btn btn-primary',
                            'onclick' => 'toptenProcess();'
                        ]);
                        ?>
                    </div>

                </div>
                <hr>
                <br>
                <div id="toptenTable">
                    <?php
                    foreach ($secondDiagram as $values) {
                        $secondTime[] = "Last Update : " . ($values['date']);
                        $secondData[] = array('type' => 'column',
                            'name' => "Table Name : " . $values['table_name'],
                            'data' => array((int) $values['row_total']));
                    }
                    echo
                    Highcharts::widget([
                        'id' => 'toptenChart',
                        'options' => [
                            'chart' => [
                                'type' => 'colomn',
                                'height' => '200',
                                'width' => '500'
                            ],
                            'title' => ['text' => ''],
                            'xAxis' => [
                                'categories' => $secondTime
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'Row Total']
                            ],
                            'series' => $secondData,
                            'legend' => 'disable',
                            'credits' => 'false'
                        ]
                    ]);
                    ?>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">

        </div>

        <?php
        ActiveForm::end();
        ?>

        <?php
        Modal::begin([
            'header' => '<h3> <strong>Alert  </strong></h3>',
            'id' => 'myModal',
            'size' => 'modal-sm',]);

        echo "<div class='alert alert-warning' id='myModalContent'>Data Not Found</div>";

        Modal::end();

        Modal::begin([
            'header' => '<h4>Siswa</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'><div>";
        ?>
    </div>

</div>

<script>
    function partitionProcess() {
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/site/partition' ?>',
            type: 'post',
            data: {from: $('#Partition').val(),
                to: $('#Partition-2').val(),
                partition_id: $('#partitiontable-partition_id').val()
            },
            success: function(data) {
                if (data == 'out') {
                    $("#myModal").modal('show')
                            .find("#modalContent")
                            .load($(this).attr('value'));
                } else {
                    $("#partitionTable").html(data);
                }

            }
        });
    }

    function toptenProcess() {
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/site/topten' ?>',
            type: 'post',
            data: {from: $('#topten').val(), to: $('#topten-2').val(), table_name: $('#toptable-table_name').val()},
            success: function(secondData) {
                if (data == 'out') {
                    $("#myModal").modal('show')
                            .find("#modalContent")
                            .load($(this).attr('value'));
                } else {
                    $('#toptenTable').html(secondData);
                }
            }
        });
    }
</script>