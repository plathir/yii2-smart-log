<?php

/**
 * @var \yii\web\View $this
 * @var \yii\data\ArrayDataProvider $dataProvider
 */
use yii\grid\GridView;
use yii\helpers\Html;
use zhuravljov\yii\logreader\Log;

$this->title = 'Logs';
$this->params['breadcrumbs'][] = 'Logs';
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Index of Log files </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>

    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="logreader-index">
            <?=
            GridView::widget([
                'layout' => '{items}',
                'tableOptions' => ['class' => 'table'],
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function (Log $log) {
                            return Html::tag('h5', join("\n", [
                                        Html::encode($log->name),
                                        '<br/>',
                                        Html::tag('small', Html::encode($log->fileName)),
                            ]));
                        },
                    ],
                    [
                        'attribute' => 'counts',
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'sort-ordinal'],
                        'value' => function (Log $log) {
                            return $this->render('_counts', ['log' => $log]);
                        },
                    ],
                    [
                        'attribute' => 'size',
                        'format' => 'shortSize',
                        'headerOptions' => ['class' => 'sort-ordinal'],
                    ],
                    [
                        'attribute' => 'updatedAt',
                        'format' => 'relativeTime',
                        'headerOptions' => ['class' => 'sort-numerical'],
                    ],
                    [
                        'class' => '\yii\grid\ActionColumn',
                        'template' => '{history} {view} {archive}',
                        'urlCreator' => function ($action, Log $log) {
                            return [$action, 'slug' => $log->slug];
                        },
                        'buttons' => [
                            'history' => function ($url) {
                                return Html::a('History', $url, [
                                            'class' => 'btn btn-xs btn-default',
                                ]);
                            },
                            'view' => function ($url, Log $log) {
                                return !$log->isExist ? '' : Html::a('View', $url, [
                                            'class' => 'btn btn-xs btn-default',
                                            'target' => '_blank',
                                ]);
                            },
                            'archive' => function ($url, Log $log) {
                                return !$log->isExist ? '' : Html::a('Archive', $url, [
                                            'class' => 'btn btn-xs btn-default',
                                            'data' => ['method' => 'post', 'confirm' => 'Are you sure?'],
                                ]);
                            },
                        ],
                    ],
                ],
            ])
            ?>
        </div>      


    </div>
</div>

<?php
$this->registerCss(<<<CSS

.logreader-index .table tbody td {
    vertical-align: middle;
}

CSS
);
