<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\log\Logger;
use alyanik\viewlog\models\Log;

/* @var $this yii\web\View */
/* @var $searchModel alyanik\viewlog\models\search\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <p>
        <?= Html::a('Create Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                    return \yii\helpers\StringHelper::truncate($model->prefix, 100);
                },
            ],
            [
                'attribute' => 'log_time',
                'format'    => 'datetime',
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