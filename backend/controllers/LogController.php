<?php

namespace plathir\log\controllers;

use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Settings model.
 *  @property \plathir\log\Module $module
 */
class LogController extends Controller {

    public function __construct($id, $module) {
        parent::__construct($id, $module);
    }


  public function actionIndex() {
      
  }    
}