<?php

namespace plathir\log;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'plathir\log\controllers';
    public $defaultRoute = 'log';
    public $modulename = '';

    public function init() {

        parent::init();
    }

}
