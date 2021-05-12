<?php

namespace plathir\log\backend\controllers;

use yii\web\Controller;
use plathir\log\backend\models\Log;
use plathir\log\backend\models\Log_s;
use Yii;

/**
 * AdminController implements the CRUD actions for Settings model.
 *  @property \plathir\log\Module $module
 */
class LogController extends Controller {

    public function __construct($id, $module) {
        parent::__construct($id, $module);
        $this->layout = "main";
    }

    public function actionIndex() {
        if (\yii::$app->user->can('SystemLog')) {
            $searchModel = new Log_s();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new \yii\web\NotAcceptableHttpException(Yii::t('log', 'No Permission to View Logs '));
        }
    }

    public function actionView($id) {
        if (\yii::$app->user->can('SystemLog')) {
            $model = $this->findModel($id);
            return $this->render('view', [
                        'model' => $model,
            ]);
        } else {
            throw new \yii\web\NotAcceptableHttpException(Yii::t('log', 'No Permission to View Log '));
        }
    }

    public function actionDelete($id) {
        if (\yii::$app->user->can('SystemLog')) {
            if ($this->findModel($id)->delete()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('log', 'Log entry : {id} deleted', ['id' => $id]));
            }
            return $this->redirect(['index']);
        } else {
            throw new \yii\web\NotAcceptableHttpException(Yii::t('log', 'No Permission to Delete Log '));
        }
    }

    protected function findModel($id) {
        if (($model = Log::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('log', 'The requested page does not exist.'));
        }
    }

}
