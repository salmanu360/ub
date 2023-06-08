<?php

namespace backend\controllers;
use  yii\web\Session;
/**
* This is the class for controller "UsersController".
*/
class UsersController extends \backend\controllers\base\UsersController
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


	 public function actionLogout()
    {

  //      session_start();
		// session_destroy();
		// //die();
	//header("Location: https://universitybureau.com/backend/web/site/login");

          \Yii::$app->user->logout();
          // die('test');
		//  if(\Yii::$app->user->logout()){
		  	 //echo("<script>location.href = 'https://universitybureau.com/backend/web/site/login';</script>");

           return $this->redirect(['site/login']);
		 // }
		  


      //  return  $this->redirect(['site/login']);
    }
    
}
