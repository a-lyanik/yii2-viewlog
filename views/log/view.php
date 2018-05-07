<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model alyanik\viewlog\models\Log */

$this->title = $model->category;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-view">

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this log?',
                'method'  => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'level',
            'category',
            [
                'attribute' => 'log_time',
                'format'    => 'datetime',
                'value'     => (int) $model->log_time
            ],
            'prefix:ntext',
            [
                'attribute' => 'message',
                'format'    => 'raw',
                'value'     => Html::tag('pre', $model->message, ['style' => 'white-space: pre-wrap'])
            ],
        ],
    ]) ?>

</div>