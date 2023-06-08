<?php
// use Yii;
namespace backend\controllers;
use common\models\User;
use common\models\School;
/**
* This is the class for controller "SchoolController".
*/
class SchoolController extends \backend\controllers\base\SchoolController
{

     const SCHOOL_PASSWORD = '23#28&5';

    const USER_STATUS_INACTIVE = 0;   
    const USER_STATUS_ACTIVE = 1;   
    

    public function actionApprove1($id){
        $model = $this->findModel($id);
        $password = School::getPassword();

        try{
            $i=0;
            $user_info= User::find()->where(['id'=>$model->user_id])->one();

            $password="23#28&5";
            if(empty($user_info)){

            $user = new User(); 
            $user->username =  $model->cont_email;
            $user->email =  $model->cont_email;

            $user->password_hash = \Yii::$app->security->generatePasswordHash($password);
            $user->type =  USER::TYPE_USER_SCHOOL;
            $user->auth_key = uniqid(); 
            $user->password = $password;
            $user->confirm_password= $password;


               $mail = Yii::$app->mailer->compose('@common/mail/institution/institute-accept', ['user' => $user, 'school' => $model]) 
                        ->setFrom('noreply@universitybureau.com')
                        ->setTo($user->email)
                        // ->setTo('ibpahulpreetsingh90@gmail.com')
                        ->setSubject('Congratulations...!! Your request has been approved by Admin.')
                        ->send(); 
 

            
        }else{
            $i=1;
            $user= $user_info;
        }
            $user->status=USER::STATUS_ACTIVE;
     
        

            if($user->save()){
                if($i==0){
                    $model->trigger(School::EVENT_SCHOOL_REGISTER);
                }
                $model->agree=true;
                $model->status=1;
                $model->user_id=$user->id;


              

                $model->save(false);
                if($i==0){
                        \Yii::$app->getSession()->addFlash('success', "School has been successfully created in our System.");
                    }else{
                        \Yii::$app->getSession()->addFlash('success', "School status has been successfully updated."); 
                    }
              
            }
       }catch(\Exception $e) {
         //  throw $e;
        \Yii::$app->getSession()->addFlash('error', "Internal serve Error ");
    }




    if($i==0){
      return $this->redirect(['school/index']);
    }else{
        return $this->redirect(['index', 'id' => $model->id]);  
    }

}

 

    public function actionDisapprove1($id){
        $model = $this->findModel($id);
        try{
            $model->status=2;
            $model->save(false);
            \Yii::$app->getSession()->addFlash('success', "School has been successfully Disapproved.");
             echo("<script>location.href = 'https://universitybureau.com/backend/web/school/index';</script>");
        }catch(\Exception $e) {
            \Yii::$app->getSession()->addFlash('error', "Internal serve Error ");
        }



         $mail = Yii::$app->mailer->compose('@common/mail/institution/institute-reject') 
                        ->setFrom('noreply@universitybureau.com')
                        ->setTo([$model->cont_email])
                        // ->setTo('ibpahulpreetsingh90@gmail.com')
                        ->setSubject('Sorry...!! Your request has been Dissapproved by Admin.');                      
                    

                    if($mail->send()) {
                        return $this->redirect(Yii::$app->request->referrer);
                        // return $this->redirect(['/thank/school']);
                    }
 
        
    }

}
