<?php

namespace frontend\controllers;

use yii\web\Controller;

class ThankController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	 $this->layout = 'home-layout';
        return $this->render('index');
    }

     public function actionInstitutionThank()
    {
        return $this->render('institutionThank');
    }

    public function actionResetpasswordthank()
    {
        return $this->render('resetpasswordthank');
    }
    public function actionRequestpasswordresetemail()
    {
        return $this->render('requestpasswordresetemail');
    }


     public function actionSchool()
    {
    	 $this->layout = 'home-layout';
        return $this->render('school');
    }



}

?>