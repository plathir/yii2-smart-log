<?php

use yii\grid\GridView;

?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('log', 'Index of Log entries ') ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>

    </div><!-- /.box-header -->
    <div class="box-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'level',
                'category',
                'log_time:datetime',
                'prefix',
//                ['class' => 'yii\grid\ActionColumn'],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
//        'message',
            ],
        ])
        ?>
    </div>
</div>


