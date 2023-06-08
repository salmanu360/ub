<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //        'access' => [
    //             'class' => AccessControl::className(),
    //             'only' => ['logout'],
    //             'rules' => [
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }


public function beforeAction($action)
{
    if(\Yii::$app->user->isGuest && $action->id !='login'){
         \Yii::$app->response->redirect(['site/login']);
       //something code right here if user valided
    }
    return true;
}

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    // public function beforeAction($action) {
    //     if (Yii::$app->user->isGuest && Yii::$app->controller->action->id != "login") {
    //         Yii::$app->user->loginRequired();
    //     }
    //     return true;  
    // }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $this->layout = 'main';
        if(\Yii::$app->user->isGuest) {
            \Yii::$app->response->redirect(['site/login']);
        }else{
            if( \Yii::$app->user->identity->type==6){
                //return $this->render('index');
                 return $this->render('applicationteam_index');
            }else if( \Yii::$app->user->identity->type==7){
                return $this->render('seo_team_index');
            }else if( \Yii::$app->user->identity->type==4){
                return $this->render('moderate_admin_index');
            }else if( \Yii::$app->user->identity->type==5){
                 return $this->render('index');
               // return $this->render('rm_index');
            }else{
                return $this->render('index');
            }
        }
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return  $this->redirect(['site/index']);
           // return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(['site/index']);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        \Yii::$app->user->logout();
        return $this->redirect(['site/login']);
    }
}
?>