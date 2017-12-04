<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
    'id' => $id,
    'scripts' => [
        'modules/exporting',
    ],
    'options' => [
        'chart' => [
            'type' => 'spline',
            'height' => '200',
            'width' => '500'
        ],
        'title' => ['text' => ''],
        'xAxis' => [
            'categories' => $categories
        ],
        'yAxis' => [
            'title' => ['text' => $yAxis]
        ],
        'series' => $series,
        'legend' => 'disable',
        'credits' => 'false'
    ]
]);
