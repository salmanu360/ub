<?php

namespace frontend\controllers;
use common\models\Posts;
use yii\web\Controller;
use yii\filters\VerbFilter;

class BlogsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'home-layout';
        return $this->render('index');
    }

    public function actionView()
    {
        $this->layout = 'home-layout';
       
   

        $slug=\Yii::$app->getRequest()->url;
        $slug=str_replace('/universitybureau/blogs/','',$slug);
        $slug=str_replace('/blogs/','',$slug);
        if(strrpos($slug, "?fbclid")){
           $slug=substr($slug, 0, strrpos($slug, "?fbclid"));
        }
        $model=Posts::find()->where(['slug'=> $slug])->one();
       
        return $this->render('view',['model' => $model]);
    }

}