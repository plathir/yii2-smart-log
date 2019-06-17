<?php
namespace plathir\log\backend;

use Yii;
use \common\helpers\ThemesHelper;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'plathir\log\backend\controllers';
    public $defaultRoute = 'log';
    public $modulename = '';
    public $Theme = 'smart';

    public function init() {

        parent::init();

        $helper = new ThemesHelper();
        $path = $helper->ModuleThemePath('log', 'backend', dirname(__FILE__) . "/themes/$this->Theme");
        $path = $path . '/views';
        
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
