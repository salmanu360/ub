<?php

namespace backend\controllers;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
* This is the class for controller "UserController".
*/
class UserController extends \backend\controllers\base\UserController
{
    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest && $action->id !='login'){
               
             \Yii::$app->response->redirect(['site/login']);
              return false;
           //something code right here if user valided
        }

        return true;
    }


}
