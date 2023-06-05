<?php

namespace frontend\controllers;
// use yii\filters\VerbFilter;

class AboutUsController extends \yii\web\Controller{
    
        public function actionIndex()

        {
                $this->layout = 'home-layout';
            
         return $this->render('index');
        }
   
}


?>