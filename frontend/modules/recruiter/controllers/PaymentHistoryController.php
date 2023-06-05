<?php

namespace frontend\modules\recruiter\controllers;

use common\models\PaymentHistory;
use frontend\models\PaymentHistorySearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* This is the class for controller "PaymentHistoryController".
*/
class PaymentHistoryController extends \frontend\modules\recruiter\controllers\base\PaymentHistoryController
{
    public function actionIndex() {
        $this->layout = 'inner';

        $searchModel  = new PaymentHistorySearch;
        $dataProvider = $searchModel->search($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
        'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id) {
        $this->layout = 'inner';
        
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
        'model' => $this->findModel($id),
        ]);
    }
}
