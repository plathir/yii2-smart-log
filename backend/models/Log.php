<?php

namespace plathir\settings\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "log".
 *
 *  @property \plathir\log\Module $module
 */
class Log extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'log';
    }

}
