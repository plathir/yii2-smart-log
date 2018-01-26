<?php

/**
 * @var \yii\web\View $this
 * @var string $name
 * @var \yii\data\ArrayDataProvider $dataProvider
 */
use yii\grid\GridView;
use yii\helpers\Html;
use zhuravljov\yii\logreader\Log;

$this->title = $name;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $name;
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
        <div class="logreader-history">
            <?=
            GridView::widget([
                'tableOptions' => ['class' => 'table'],
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'attribute' => 'fileName',
                        'format' => 'raw',
                        'value' => function (Log $log) {
                            return pathinfo($log->fileName, PATHINFO_BASENAME);
                        },
                    ],
                    [
                        'attribute' => 'counts',
                        'format' => 'raw',
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
                        'template' => '{view}',
                        'urlCreator' => function ($action, Log $log) {
                            return [$action, 'slug' => $log->slug, 'stamp' => $log->stamp];
                        },
                        'buttons' => [
                            'view' => function ($url) {
                                return Html::a('View', $url, [
                                            'class' => 'btn btn-xs btn-default',
                                            'target' => '_blank',
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

.logreader-history .table tbody td {
vertical-align: middle;
}

CSS
);
