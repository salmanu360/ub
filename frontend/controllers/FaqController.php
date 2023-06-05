<?php

namespace frontend\controllers;
// use yii\filters\VerbFilter;

class FaqController extends \yii\web\Controller{

	// public function init() {
 //           die('keshav');
 //      }
    
        public function actionIndex(){        
	         $this->layout = 'home-layout';
	         
	         return $this->render('index');
        }
   
}


?>