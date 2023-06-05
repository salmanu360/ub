<?php

namespace frontend\modules\school\controllers;
// use common\models\School;
 use common\models\SchoolImage;
 use yii\web\UploadedFile;
use frontend\models\SchoolUserForm;


// use yii\web\Controller;

use Yii;
use common\models\School;
use yii\web\Controller;
use frontend\models\ForStudents;
use common\models\User;
use yii\web\HttpException;




/**
 * Default controller for the `school` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {


        $this->layout='./inner';
        $model = new School;

        // try {
        // if ($model->load($_POST) && $model->save()) {
        // return $this->redirect(['view', 'id' => $model->id]);
        // } elseif (!\Yii::$app->request->isPost) {
        // $model->load($_GET);
        // }
        // } catch (\Exception $e) {
        // $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
        // $model->addError('_exception', $msg);
        // }

        
        return $this->render('index', ['model' => $model]);
    }



     public function actionDashboard() {
        $this->layout = './inner';
        
        return $this->render('dashboard');
    }


    public function actionInfo()
    {
       $this->layout='./inner';
        $model = new SchoolImage;
        $user_id = \Yii::$app->user->identity->id;
        $user = School::find()->where(['user_id'=>$user_id])->one();  
        // try {
        // if ($model->load($_POST) && $model->save()) {
        // return $this->redirect(['view', 'id' => $model->id]);
        // } elseif (!\Yii::$app->request->isPost) {
        // $model->load($_GET);
        // }
        // } catch (\Exception $e) {
        // $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
        // $model->addError('_exception', $msg);
        // }
      
        if (\Yii::$app->request->isPost) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $image_name=uniqid() . '.' . $model->file->extension;
                $model->name =  $image_name;
                $model->file->saveAs('uploads/' . $image_name);
                $model->school_id=$user->id;
                $model->save(false);
                \Yii::$app->request->bodyParams = [];
                $model = new SchoolImage;
                $model->file ='';
        }
        return $this->render('info', ['model' => $model]);
    }

 public function actionUpdate()
 {
       $this->layout='./inner';
          
        $model = School::find()->where(['user_id'=>\Yii::$app->user->identity->id])->one();
        //\Yii::$app->getSession()->addFlash('success', "Your Resquest has been successfully send we will revert you Back.");
        try {
             
            if ($model->load($_POST)) {
               
                  $model->save(false);
               // $model->ref_no="UBS".date('Yd').$model->id;
               // $model->save(false);
                \Yii::$app->getSession()->addFlash('success', "Your data has been successfully updated.");
                $model = new School;
                return $this->redirect(['/school/info']);
               // return $this->render('/school/info');
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            //throw $e;
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);

            var_dump($msg);
            die();
        }
      
       
         return $this->render('update', ['model' => $model]);
    }




    public function actionProgram()
    {
       $this->layout='./inner';
        $model = new School;

        // try {
        // if ($model->load($_POST) && $model->save()) {
        // return $this->redirect(['view', 'id' => $model->id]);
        // } elseif (!\Yii::$app->request->isPost) {
        // $model->load($_GET);
        // }
        // } catch (\Exception $e) {
        // $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
        // $model->addError('_exception', $msg);
        // }
        return $this->render('program', ['model' => $model]);
    }


     public function actionSettings() {
        $this->layout='./inner';

        $model= new SchoolUserForm; 
        $flag = false; 

       if (Yii::$app->request->isPost) {
            $id = Yii::$app->user->identity->id;
            $user = $this->findUserModel($id); 
            
            if(!empty($_POST['SchoolUserForm']['password'])) {                
                
                $current_pass = $_POST['current_password'];
                $hash = $user->password_hash;
            
                if(!password_verify($current_pass, $hash)){
                    Yii::$app->session->setFlash('error', 'Incorrect current password');
                } else {
                    if( $_POST['SchoolUserForm']['password'] !==  $_POST['SchoolUserForm']['confirm_password']){
                        Yii::$app->session->setFlash('error', 'Password doesn\'t match.'); 
                    } else {
                        $new_password = Yii::$app->security->generatePasswordHash($_POST['SchoolUserForm']['password']);
                        $user->password_hash = $new_password;
                        if($user->save()){
                             $flag = true;
                            Yii::$app->session->setFlash('success', 'Password changed successfully');
                        }
                    }
                }                
            }
            
            if(!empty( $_FILES['profile_pic']['name'] ) ) {
                $profile_pic = $user->upload_profile_pic();               
                $row = Yii::$app->db->createCommand()->update('user', ['profile_pic' => $profile_pic], 'id = '.$id)->execute();
                  $flag = true;
                if($row > 0){
                    Yii::$app->session->setFlash('success', 'Settings updated successfully');
                } else {
                    Yii::$app->session->setFlash('error', 'Profile pic can not upload'); 
                }
            }
        }
      return $this->render('account_settings', ['model' => $model, $flag => $flag]);
}


protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }



}
