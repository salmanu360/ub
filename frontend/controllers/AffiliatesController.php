<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Affiliate;
use common\models\affiliateSearch;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;

class AffiliatesController extends \yii\web\Controller
{
    /*public function actionIndex()
    {
        $this->layout = 'home-layout';
        return $this->render('index');

    }*/

    public function actionIndex()
    {
        
        /*echo "<script>
                window.addEventListener('load',function(){
                    swal('Good job!', 'You clicked the button!', 'success');
                    window.location.href = 'affiliates/index';
                  });</script>";*/


        $this->layout = 'home-layout';
        $model = new Affiliate();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // echo '<pre>';print_r($_POST);die;
                $model->save();
                echo "<script>
                window.addEventListener('load',function(){
                    swal('Congratulations!', 'Thank you for contacting us. We will respond to you as soon as possible!', 'success');
                    setTimeout(function () {
                      window.location.href = 'affiliates/index';
                    }, 2000);
                  });</script>";
               // Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
               // return $this->render('/thank/country_thanks');
                //$this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

   
}

