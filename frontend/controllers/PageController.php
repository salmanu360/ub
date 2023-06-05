<?php
namespace frontend\controllers;
use common\models\Pages;
use yii\web\Controller;
use yii\filters\VerbFilter;

class PageController extends \yii\web\Controller
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
        $slug=str_replace('/universitybureau/page/','',$slug);
        $slug=str_replace('/page/','',$slug);
       
        $model=Pages::find()->where(['slug'=> $slug])->one();
     
       if(!empty( $model)){
        return $this->render('view',['model' => $model]);
       }
       
    }

}