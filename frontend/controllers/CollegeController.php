<?php

namespace frontend\controllers;

/**
* This is the class for controller "CourseController".
*/
class CollegeController extends \yii\web\Controller
{

	 public function actionIndex()
    {
    	//die('test');

    	ob_start();
       header("Location:  https://universitybureau.com");
       exit();
      
    }

}