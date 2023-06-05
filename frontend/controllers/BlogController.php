<?php



namespace frontend\controllers;



use yii\web\Controller;

use yii\filters\VerbFilter;



class BlogController extends \yii\web\Controller

{

    public function actionIndex()

    {

        $this->layout="blank";

        return $this->render('index');

    }

    

    public function actionHello()

    {

        

        return $this->render('hello');

    }

    

    



    



}