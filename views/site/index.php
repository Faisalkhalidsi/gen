<?php
/* @var $this yii\web\View */
$this->title = 'Simple Dashboard';

use miloschuman\highcharts\Highcharts;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->title = 'OSM';
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

        <!--second-->
        <div class="row">
            <div class="col-lg-6 tobeRounded">
                <div class="row">
                    <div class="col-sm-9" style="padding-left: 50px">
                        <?php
                        //dropdown list
                        $modelLastanalyzed = new \app\models\LastAnalyzedTable();
                        echo $form->field($modelLastanalyzed, 'table_name')
                                ->dropDownList(ArrayHelper::map(\app\models\LastAnalyzedTable::find()->all(), 'table_name', 'table_name'), ['prompt' => 'All']);

                        echo DatePicker::widget([
                            'name' => 'from_date',
                            'id' => 'Lastanalyzed',
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
                            'id' => 'lastanalyzedBtn',
                            'class' => 'btn btn-primary',
                            'onclick' => 'lastanalyzedProcess();'
                        ]);
                        ?>
                    </div>
                </div>
                <hr>
                <br>
                <?php ?>
                <div id="lastanalyzedTable">
                    <?php
                    foreach ($thirdData as $values) {
                        $c[] = "Partition ID";
                        $b[] = array('type' => 'column',
                            'name' => "Table Name : " . $values['table_name'],
                            'data' => array((int) $values['row_total']));
                    }
                    echo Highcharts::widget([
                        'id' => 'lastanalyzedChart',
                        'options' => [
                            'chart' => [
                                'type' => 'column',
                                'height' => '200',
                                'width' => '500'
                            ],
                            'title' => ['text' => ''],
                            'xAxis' => [
                                'categories' => $c
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'Row Total']
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


            </div>
        </div>

        <?php
        ActiveForm::end();
        ?>

        <?php
        Modal::begin([
            'header' => '<h3> <strong>Alert  </strong></h3>',
            'id' => 'myModal',
            'size' => 'modal-sm',]);

        echo "<div class='alert alert-warning' id='myModalContent'><i class='fa fa-car'></i>Data Not Found</div>";

        Modal::end();
        ?>
    </div>

</div>

<script>
    function process(url, from, to, id, position) {
        $.ajax({
            url: url,
            type: 'post',
            data: {
                from: from,
                to: to,
                id: id
            },
            success: function(data) {
                if (data == 'out') {
                    $("#myModal").modal('show')
                            .find("#modalContent")
                            .load($(this).attr('value'));
                } else {
                    position.html(data);
                }
            }
        });
    }
    function partitionProcess() {
        var url = '<?php echo Yii::$app->request->baseUrl . '/site/partition' ?>';
        var from = $('#Partition').val();
        var to = $('#Partition-2').val();
        var id = $('#partitiontable-partition_id').val();
        var position = $("#partitionTable");
        process(url, from, to, id, position);
    }

    function toptenProcess() {
        var url = '<?php echo Yii::$app->request->baseUrl . '/site/topten' ?>';
        var from = $('#topten').val();
        var to = $('#topten-2').val();
        var id = $('#toptable-table_name').val();
        var position = $('#toptenTable');
        process(url, from, to, id, position);
    }

    function lastanalyzedProcess() {
        var url = '<?php echo Yii::$app->request->baseUrl . '/site/lastanalyzed' ?>';
        var from = $('#Lastanalyzed').val();
        var to = $('#Lastanalyzed-2').val();
        var id = $('#lastanalyzedtable-table_name').val();
        var position = $('#lastanalyzedTable');
        process(url, from, to, id, position);
    }
</script>