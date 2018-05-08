<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = Yii::t('log', 'Log Entry : ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('log', 'Log Index'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Yii::t('log', 'View Log entry : ' . $model->id) ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>

    </div><!-- /.box-header -->
    <div class="box-body">
        <p>
            <?=
            Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-flat',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>        
        <?php
        echo DetailView::widget([
            'model' => $model,
            //   'template' => '<tr><th style="width:20%">{label}</th><td style="width:80%;">{value}</td></tr>',
            'attributes' => [
                'id',
                'level',
                'category',
                'log_time:datetime',
                'prefix',
                //'message',
                [
                    'attribute' => 'message',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<div class=col-lg-12 style="overflow:auto; display:grid"><pre>' . $model->message . '</pre></div>';
                    },
//                    'contentOptions' => ['style' => 'width:500px'],
                ]
            ],
//           'options' => [
//             'style' => [
//                 'overflow-y' => 'scroll',
//                 'overflow-x' => 'scroll',
//             ]  
//           ]
        ]);
        ?>
    </div>
</div>    
