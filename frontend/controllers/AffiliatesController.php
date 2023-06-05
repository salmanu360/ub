<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Affiliate;
use common\models\affiliateSearch;
use yii\web\NotFoundHttpException;

class AffiliatesController extends \yii\web\Controller
{
    /*public function actionIndex()
    {
        $this->layout = 'home-layout';
        return $this->render('index');

    }*/

    public function actionIndex()
    {
flush();
        $this->layout = 'home-layout';
        $model = new Affiliate();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // echo '<pre>';print_r($_POST);die;
                $model->save();
                flush();
                echo"<script>
                window.addEventListener('load',function(){
                    swal('Congratulations!', 'Thank you for contacting us. We will respond to you as soon as possible!', 'success');
                    setTimeout(function () {
                    header('Location: http://www.website.com/'');
                      die('should have redirected by now');
                    },5000);
                    
                  });</script>";
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

   
}

