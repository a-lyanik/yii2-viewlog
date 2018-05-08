<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\log\Logger;
use alyanik\viewlog\models\Log;
use \yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel alyanik\viewlog\models\search\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns' => [
            [
                'attribute' => 'level',
                'value'     => function ($model) {
                    return Logger::getLevelName($model->level);
                },
                'filter'    => Log::basicTypeNames()
            ],
            'category',
            [
                'attribute' => 'prefix',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return StringHelper::truncate($model->prefix, 100);
                },
            ],
            [
                'attribute' => 'log_time',
                'format'    => ['datetime', 'php:d.m.Y H:i:s'],
                'value'     => function ($model) {
                    return (int)$model->log_time;
                }
            ],
            [
                'class'     => 'yii\grid\ActionColumn',
                'template'  => '{view} {delete}'
            ]
        ],
    ]); ?>
</div>