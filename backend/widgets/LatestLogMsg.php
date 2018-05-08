<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace plathir\log\backend\widgets;

use yii\base\Widget;
use plathir\log\backend\models\Log_s;
use Yii;

class LatestLogMsg extends Widget {

    public $Theme = 'smart';

    public function run() {
        // $this->registerClientAssets();
        $logs = 'Test';
        return $this->render('latest_log_msg', [
                    'logs' => $logs,
                    'widget' => $this
        ]);
    }

//    public function registerClientAssets() {
//        $view = $this->getView();
//        $assets = Asset::register($view);
//    }

    public function getViewPath() {

        return Yii::getAlias('@vendor') . '/plathir/yii2-smart-log/backend/widgets/themes/' . $this->Theme . '/views';
    }

}
