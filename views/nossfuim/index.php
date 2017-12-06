<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'UIM';
?>
<div class="uim-asm-index">
    <blockquote class="blockquote">
        <h4><strong><?= Html::encode($this->title) ?></strong></h4>
    </blockquote>
    <i>*Last Update <?php echo $last_update['date'] . " " . $last_update['time']; ?></i>
    <hr>
    <?php
    $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'enableAjaxValidation' => true,
                'id' => 'uimForm'
    ]);
    ?>
    <div class="row">
        <div id="asmOne" class="col-lg-3">
            <?php
            $name = $asmDATA01['name'];
            $free = $asmDATA01['free'];
            $total = $asmDATA01['total'];
            $used = $total - $free;
            $categories = array($free, $used);

            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                ],
                'id' => 'asmDATA01',
                'options' => [
                    'title' => [
                        'text' => 'DATA01',
                    ],
                    'xAxis' => [
                        'categories' => $categories,
                    ],
                    'series' => [
                        [
                            'type' => 'pie',
                            'name' => 'Total',
                            'data' => [
                                [
                                    'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                    'y' => $free,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                ],
                                [
                                    'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                    'y' => $used,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                ],
                            ],
                            'size' => 150,
                            'showInLegend' => true,
                            'dataLabels' => [
                                'enabled' => false,
                            ],
                        ],
                    ],
                    'credits' => 'false'
                ]
            ]);
            ?>
        </div>
        <div class="col-lg-3">
            <?php
            $name = $asmDATA02['name'];
            $free = $asmDATA02['free'];
            $total = $asmDATA02['total'];
            $used = $total - $free;
            $categories = array($free, $used);

            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                ],
                'id' => 'asmDATA02',
                'options' => [
                    'title' => [
                        'text' => 'DATA02',
                    ],
                    'xAxis' => [
                        'categories' => $categories,
                    ],
                    'series' => [
                        [
                            'type' => 'pie',
                            'name' => 'Total',
                            'data' => [
                                [
                                    'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                    'y' => $free,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                ],
                                [
                                    'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                    'y' => $used,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                ],
                            ],
                            'size' => 150,
                            'showInLegend' => true,
                            'dataLabels' => [
                                'enabled' => false,
                            ],
                        ],
                    ],
                    'credits' => 'false'
                ]
            ]);
            ?>
        </div>
        <div class="col-lg-3">
            <?php
            $name = $asmDATA03['name'];
            $free = $asmDATA03['free'];
//                $free = '';
            $total = $asmDATA03['total'];
            $used = $total - $free;
            $categories = array($free, $used);

            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                ],
                'id' => 'asmDATA03',
                'options' => [
                    'title' => [
                        'text' => 'DATA03',
                    ],
                    'xAxis' => [
                        'categories' => $categories,
                    ],
                    'series' => [
                        [
                            'type' => 'pie',
                            'name' => 'Total',
                            'data' => [
                                [
                                    'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                    'y' => $free,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                ],
                                [
                                    'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                    'y' => $used,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                ],
                            ],
                            'size' => 150,
                            'showInLegend' => true,
                            'dataLabels' => [
                                'enabled' => false,
                            ],
                        ],
                    ],
                    'credits' => 'false'
                ]
            ]);
            ?>
        </div>


        <div class="col-lg-3">
            <?php
            $name = $asmDATA04['name'];
            $free = $asmDATA04['free'];
            $total = $asmDATA04['total'];
            $used = $total - $free;
            $categories = array($free, $used);

            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                ],
                'id' => 'asmDATA04',
                'options' => [
                    'title' => [
                        'text' => 'DATA04',
                    ],
                    'xAxis' => [
                        'categories' => $categories,
                    ],
                    'series' => [
                        [
                            'type' => 'pie',
                            'name' => 'Total',
                            'data' => [
                                [
                                    'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                    'y' => $free,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                ],
                                [
                                    'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                    'y' => $used,
                                    'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                ],
                            ],
                            'size' => 150,
                            'showInLegend' => true,
                            'dataLabels' => [
                                'enabled' => false,
                            ],
                        ],
                    ],
                    'credits' => 'false'
                ]
            ]);
            ?>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <?php
                $name = $asmRECO['name'];
                $free = $asmRECO['free'];
                $total = $asmRECO['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmRECO',
                    'options' => [
                        'title' => [
                            'text' => 'RECO',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmGOLD['name'];
                $free = $asmGOLD['free'];
                $chek = 123;
                if (strpos($free, ".") == false) {
//                     echo strlen($free);
                    $y = 1;
                    for ($i = 0; $i < strlen($free); $i++) {
                        $y = $y . "0";
                    }

//                     echo $y;
//                     echo $free/(int)$y;
                    $int = (int) $y;
                    $free = ($free / $int);
                }
                $total = $asmGOLD['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmGOLD',
                    'options' => [
                        'title' => [
                            'text' => 'GOLD',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmOCR['name'];
                $free = $asmOCR['free'];
                $total = $asmOCR['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmOCR',
                    'options' => [
                        'title' => [
                            'text' => 'OCR',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmINDEX01['name'];
                $free = $asmINDEX01['free'];
//                $free = '';
                $total = $asmINDEX01['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmINDEX01',
                    'options' => [
                        'title' => [
                            'text' => 'INDEX01',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmOCR['name'];
                $free = $asmOCR['free'];
//                $free = '';
                $total = $asmOCR['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmOCR',
                    'options' => [
                        'title' => [
                            'text' => 'OCR',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmDATA04['name'];
                $free = $asmDATA04['free'];
//                $free = '';
                $total = $asmDATA04['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmDATA04',
                    'options' => [
                        'title' => [
                            'text' => 'DATA04',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
        </div>
        <div id="row">
            <div class="col-lg-3">
                <?php
                $name = $asmDATA['name'];
                $free = $asmDATA['free'];
//                $free = '';
                $total = $asmDATA['total'];
                $used = $total - $free;
                $categories = array($free, $used);
                $name = $asmDATA['name'];
                $free = $asmDATA['free'];
//                $free = '';
                $total = $asmDATA['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmDATA',
                    'options' => [
                        'title' => [
                            'text' => 'DATA',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmREDO_SSD['name'];
                $free = $asmREDO_SSD['free'];
//                $free = '';
                $total = $asmREDO_SSD['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmREDO_SSD',
                    'options' => [
                        'title' => [
                            'text' => 'REDO_SSD',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmINDEX04['name'];
                $free = $asmINDEX04['free'];
//                $free = '';
                $total = $asmINDEX04['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmINDEX04',
                    'options' => [
                        'title' => [
                            'text' => 'INDEX04',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
        </div>
        <div id="row">
            <div class="col-lg-3">
                <?php
                $name = $asmARCH['name'];
                $free = $asmARCH['free'];
//                $free = '';
                $total = $asmARCH['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmARCH',
                    'options' => [
                        'title' => [
                            'text' => 'ARCH',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmINDEX03['name'];
                $free = $asmINDEX03['free'];
                $total = $asmINDEX03['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmINDEX03',
                    'options' => [
                        'title' => [
                            'text' => 'INDEX03',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>

            </div>
            <div class="col-lg-3">
                <?php
                $name = $asmINDEX02['name'];
                $free = $asmINDEX02['free'];
//                $free = '';
                $total = $asmINDEX02['total'];
                $used = $total - $free;
                $categories = array($free, $used);

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                    ],
                    'id' => 'asmINDEX02',
                    'options' => [
                        'title' => [
                            'text' => 'INDEX02',
                        ],
                        'xAxis' => [
                            'categories' => $categories,
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total',
                                'data' => [
                                    [
                                        'name' => "Free (" . number_format(((float) $free / $total * 100), 2, '.', '') . "%)",
                                        'y' => $free,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[10]'), // Jane's color
                                    ],
                                    [
                                        'name' => "Used (" . number_format(((float) $used / $total * 100), 2, '.', '') . "%)",
                                        'y' => $used,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // John's color
                                    ],
                                ],
                                'size' => 150,
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                        'credits' => 'false'
                    ]
                ]);
                ?>
            </div>


        </div>
        <?php
        ActiveForm::end();
        ?>
    </div>

    <script>
        function process(url, position) {
            $.ajax({
                url: url,
                type: 'post',
//                data: {
//                    from: from,
//                    to: to,
//                    id: id
//                },
                success: function(data) {
                    if (data == 'out') {
                        $("#myModal").modal('show')
                                .find("#modalContent")
                                .load($(this).attr('value'));
                    } else {
                        position.empty().append(data);
                    }
                }
            });
        }

        function buildDiagram() {
//            var url = '<?php echo Yii::$app->request->baseUrl . '/nossfuim/pie' ?>';
//            var position = $("#asmOne");
//            process(url, position);
        }
    </script><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

