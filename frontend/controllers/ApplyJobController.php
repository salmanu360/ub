<?php

namespace frontend\controllers;
// use yii\filters\VerbFilter;
use Yii;
use frontend\models\ApplyForm;
use common\models\ApplyJobs;
use yii\web\Controller;


class ApplyJobController extends Controller
{
    
        public function actionIndex() {
                $this->layout = 'home-layout';


                $modelForm = new ApplyForm();
                $model = new ApplyJobs();

                if(\Yii::$app->request->isPost){
                        $post = Yii::$app->request->post("ApplyJobs");
                        $to = [ $post['email'], 'amitrkumar715@gmail.com' ];
                        $subject = 'Apply Jobs Form';
                        
                        $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation', ['data' => $post])
                                ->setFrom(Yii::$app->params['senderEmail'])
                                ->setTo($to)
                                ->setSubject($subject);
                        
                                if($mail->send()){
                                        Yii::$app->session->setFlash('success', "You jave applied successfully!");
                                } else {
                                        Yii::$app->session->setFlash('error', "Error in sending email");
                                        //throw new Exception("Unable to send email");	
                                }    
                        
             
                     
                        // if($modelForm->validate() && $modelForm->load(\Yii::$app->request->post())){
                        //      $model->save(falses);
                        //      return $this->redirect(Url::previous());        
                        // }
                }

                //$model->saveData();
            
               return $this->render('index', ['model' => $model]);
        }
   
}

?>
