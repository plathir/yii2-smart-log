<?php
namespace plathir\log\backend;

use Yii;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'plathir\log\backend\controllers';
    public $defaultRoute = 'log';
    public $modulename = '';
    public $Theme = 'smart';

    public function init() {

        parent::init();

        $path = Yii::getAlias('@vendor') . '/plathir/yii2-smart-log/backend/themes/' . $this->Theme . '/views';
        $this->setViewPath($path);
        $this->registerTranslations();
    }

    public function registerTranslations() {
        /*         * This registers translations for the widgets module * */
        Yii::$app->i18n->translations['log'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => Yii::getAlias('@vendor/plathir/yii2-smart-log/backend/messages'),
        ];
    }

}
