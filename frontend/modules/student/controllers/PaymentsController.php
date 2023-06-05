<?php

namespace frontend\modules\student\controllers;

use frontend\models\ForPaymentHistory;
use frontend\models\ForPaymentHistorySearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* This is the class for controller "PaymentsController".
*/
class PaymentsController extends \frontend\modules\student\controllers\base\PaymentsController
{
    /**
    * Lists all ForPaymentHistory models.
    * @return mixed
    */
    public function actionIndex()
    {
        $this->layout = 'inner';

        $searchModel  = new ForPaymentHistorySearch;
        $dataProvider = $searchModel->search($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
    * Displays a single ForPaymentHistory model.
    * @param integer $id
    *
    * @return mixed
    */
    public function actionView($id)
    {
        $this->layout = 'inner';

        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
