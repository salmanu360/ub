<?php

namespace frontend\controllers;
use Yii;
use common\models\School;
use yii\web\Controller;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\ApplyStudent;
use common\models\Course;

use frontend\models\ForStudents;



class ServiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


public function actionApply($course_id,$school_id)
{
   
 $this->layout = 'home-layout';
 $model= new ApplyStudent; 
 if ($model->load($_POST) && $model->save()) {
     //   \Yii::$app->session->setFlash('success', "Course has been successfully Applied and we will reply to you Soon.!");
         header("Location:thanks");
}else{ 
 $course=Course::find()->where(['id'=>$course_id])->one();
    if(empty($_POST)){
     $model->school_name= $course->school->name;
     $model->course_name=$course->name;
     // $model->name=$stu->first_name."".$stu->last_name;
     // $model->email=\Yii::$app->user->identity->email;
     // $model->phone=$stu->phone_no;
    }
}
return $this->render('apply', [
'model' =>  $model,
]);
}

public function actionLogout()
    {
        //echo "keshav";
      \Yii::$app->user->logout(true);


      // return $this->goHome();
    }


 public function actionThanks(){
    $this->layout = 'home-layout';
    return $this->render('thanks');
 }

    public function actionRecruiters()
    {
        $this->layout = 'home-layout';
        
        return $this->render('recruiters');
    }

    public function actionInstitutions()
    {
        $this->layout = 'home-layout';

        $model = new School;
        //\Yii::$app->getSession()->addFlash('success', "Your Resquest has been successfully send we will revert you Back.");
        try {

            if(Yii::$app->request->isPost) {
                if ($model->load($_POST)) {
                    $model->ref_no="UBI".$model->id;

                    $model->save(false);
                    $notification=new \common\models\Notification();
                    $notification->created_by='New Institute';
                    $notification->created_at=date('Y-m-d');
                    $notification->module='Institute Register';
                    $notification->name=$model->name;
                    $notification->save(false);

                    $History=new \common\models\History();
                    $History->module='Institute ('.$model->name.')';
                    $History->action='New';
                    $History->created_at=date('Y-m-d');
                    $History->created_by='New Institute';
                    $History->save(false);

                   // $model = new School;

                    $mail = Yii::$app->mailer->compose('@common/mail/institution/institute-invitation') 
                        ->setFrom('noreply@universitybureau.com')
                        ->setTo([$model->cont_email])
                        ->setSubject('Congratulations...!! You have successfully registered.');                      
                    

                    if($mail->send()) {
                        //return $this->redirect(Yii::$app->request->referrer);
                        return $this->redirect(['/thank/school']);
                    }

                    \Yii::$app->getSession()->addFlash('success', "Your Resquest has been successfully send we will revert you as soon as Possible.");
                    
                  //  return $this->render('/service/institutions');
                } elseif (!\Yii::$app->request->isPost) {
                    $model->load($_GET);
                }         
            }
         
        } catch (\Exception $e) {
        	throw $e;
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('institutions', ['model' => $model]);
    }

    public function actionStudents()
    {
        $this->layout = 'home-layout';
        
        return $this->render('students');
    }

}
