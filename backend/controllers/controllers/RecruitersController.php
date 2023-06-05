<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Recruiters;
use backend\controllers\base\RecruitersController as BaseController;
use common\models\StudentCollegeApplied;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\HttpException;

/**
* This is the class for controller "RecruitersController".
*/
class RecruitersController extends BaseController
{
    const RECRUITER_PASSWORD = '23#28&5';

    const USER_STATUS_INACTIVE = 0;   
    const USER_STATUS_ACTIVE = 1;   

     public function actionApprove($id){
        $model = $this->findModel($id);
        $password = Recruiters::getPassword();
        
        try{
            $user_info= User::find()->where(['id'=>$model->user_id])->one();
            if(empty($user_info)){
                $user = new User();
                $user->username = $model->email;
                $user->email = $model->email;
                $user->password_hash = Yii::$app->security->generatePasswordHash($password);
                $user->type =  USER::TYPE_USER_RECRUITER;
                $user->auth_key = uniqid(); 
                $user->password = $password;

                $mail = Yii::$app->mailer->compose('recruiter/recruiter-accept', ['user' => $user, 'recruiter' => $model,'password'=>$password])
                    ->setFrom('noreply@universitybureau.com')
                    //->setTo('amitrkumar715@gmail.com')
                    ->setTo($user->email)
                    ->setSubject('Recruiter Approved from UB')                     
                    ->send(); 

            } else {
               $user = $user_info;
               $user->password_hash = Yii::$app->security->generatePasswordHash($password);
               $mail = Yii::$app->mailer->compose('recruiter/recruiter-accept', ['user' => $user, 'recruiter' => $model,'password'=>$password])
                    ->setFrom('noreply@universitybureau.com')
                    //->setTo('amitrkumar715@gmail.com')
                    ->setTo($user->email)
                    ->setSubject('Recruiter Approved from UB')                     
                    ->send(); 
               //$user->password = $password;  
               //Yii::$app->session->setFlash('error', "User already exists.");
            }
            $user->status=USER::STATUS_ACTIVE;

            if($user->save(false)){
                $model->status = self::USER_STATUS_ACTIVE;
                $model->user_id = $user->id;

                if($model->save(false)){
                    \Yii::$app->getSession()->addFlash('success', "Recruiters has been successfully created in our System.");
                }else{
                    \Yii::$app->getSession()->addFlash('success', "Recruiters status has been successfully updated.");
                }
            } else {
               \Yii::$app->getSession()->addFlash('error', "User already exists.");
            }
        }catch(\Exception $e) {
            throw $e;
            \Yii::$app->getSession()->addFlash('error', "Internal serve Error");
        }
        $this->redirect(['recruiters/index']);
        //echo("<script>location.href = 'https://universitybureau.com/backend/web/recruiters/index';</script>");
    }

    public function actionDisapprove($id){
        $model = $this->findModel($id);
        try{
            $model->status=2;
            $model->save(false);

            $mail = Yii::$app->mailer->compose('recruiter/recruiter-reject')
                ->setFrom('noreply@universitybureau.com')
                //->setTo('amitrkumar715@gmail.com')
                ->setTo($model->email)
                ->setSubject('Recruiter Disapproved from UB')                     
                ->send(); 
            
            \Yii::$app->getSession()->addFlash('success', "Recruites has been successfully Disapproved.");
            $this->redirect(['recruiters/index']);
        }catch(\Exception $e) {
            \Yii::$app->getSession()->addFlash('error', "Internal serve Error ");
        }
        
    } 

    public function actionStudents($id) {
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();

        $model = $this->findModel($id);
        $studentAppliedModel = new \common\models\StudentCollegeApplied();  

        $studentQuery = \common\models\Student::find()->where(['recruiter_id' => $id]);       
        $studentDataProvider = new ActiveDataProvider([
            'query' => $studentQuery,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        $studentAppliedQuery = \common\models\StudentCollegeApplied::find()->where(['recruiter_id' => $id]);
        $ApplicationDataProvider = new ActiveDataProvider([
            'query' => $studentAppliedQuery,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->render('student', [
            'model' => $model,
            'studentDataProvider' => $studentDataProvider,
            'ApplicationDataProvider' => $ApplicationDataProvider,            
            'studentAppliedModel' => $studentAppliedModel,
        ]);
    }

    public function actionSaveFee() {
        $id = $_POST['StudentCollegeApplied']['app_id'];
        $model = $this->findApplicationModel($id);

        if(Yii::$app->request->isPost){
            $student_id = $_POST['StudentCollegeApplied']['student_id'];
            $course_id = $_POST['StudentCollegeApplied']['course_id'];
            $application_fee = !empty($_POST['StudentCollegeApplied']['application_fee']) ? $_POST['StudentCollegeApplied']['application_fee'] : $model->application_fee;
            $visa_fee = !empty($_POST['StudentCollegeApplied']['visa_fee']) ? $_POST['StudentCollegeApplied']['visa_fee'] : $model->visa_fee;
            $commission_amount = !empty($_POST['StudentCollegeApplied']['commission_amount']) ? $_POST['StudentCollegeApplied']['commission_amount'] : $model->commission_amount;

            Yii::$app->db->createCommand()
                ->update('student_school_applied', [
                        'application_fee' => $application_fee, 
                        'visa_fee' => $visa_fee,
                        'commission_amount' => $commission_amount
                    ], 
                    "student_id = $student_id and course_id = $course_id")
                ->execute();

            return $this->redirect(Url::previous());
        }
    }

    public function actionPayCommission($id){
        $modelHistory = new \common\models\RecruiterCommisionHistory;
        
        $applications = \common\models\StudentCollegeApplied::findAll([
            'recruiter_id' => $id,
            'application_fee_status' => StudentCollegeApplied::STATUS_APP_FEE_PAID,
            'visa_fee_status' => StudentCollegeApplied::STATUS_VISA_FEE_PAID,
        ]);
        $app_count = count($applications);
        
        $app_ids = [];
        foreach($applications as $application){
            $app_ids[] = $application->id;
        }

        $historyData = [
            'application_id' => implode(',', $app_ids),
            'total_applications' => $app_count,
            'recruiter_id' => $id,
            'amount' => $modelHistory->calculateCommision($id)
        ];

        $query = \common\models\StudentCollegeApplied::updateAll([
            'pay_status' => StudentCollegeApplied::STATUS_RECRUITER_PAY_DONE
        ],
        [
            'recruiter_id' => $id,
            'pay_status' => StudentCollegeApplied::STATUS_RECRUITER_PAY_NEW,
            'application_fee_status' => StudentCollegeApplied::STATUS_APP_FEE_PAID,
            'visa_fee_status' => StudentCollegeApplied::STATUS_VISA_FEE_PAID,
        ]);

        if($query){
            $modelHistory->setAttributes($historyData, false);
            $modelHistory->save(false);

            return $this->redirect(['/recruiters/students', 'id' => $id]);  
        } else {
            throw new HttpException(404, 'The record not updated');
        }
    }

    public function actionViewDocs($ID){
        if(Yii::$app->request->isAjax){
            $student = \common\models\Student::findOne(['ID' => $ID]);
            $documents = explode(',', $student->upload_document);          

            return $this->renderAjax('document-modal', [
                'documents' => $documents,                
                'student' => $student,                
            ]);            
        }
    }

    public function actionDownloadZip($id){
        $student = \common\models\Student::findOne(['ID' => $id]);
        $files = explode(',', $student->upload_document);
       
        $webroot = Yii::getAlias('@webroot/uploads/docs/');
        $upload_dir = str_ireplace('/backend/web', '/frontend/web', $webroot);

        /* create a zip file */
        $zip = new \ZipArchive();
        $zip_name = $upload_dir."archive.zip"; // Zip name
        $zip->open($zip_name, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        foreach ($files as $file) {
            $path = $upload_dir.$file;
            if(!file_exists($path)){  
                continue;
            }               
            $zip->addFromString(basename($path), file_get_contents($path));             
        }
        $zip->close();
        
        /* Downlaod file */
        $download_path = $upload_dir . "archive.zip";
        if(file_exists($download_path)){
            \Yii::$app->response->sendFile($download_path)->send();
                unlink($download_path);
        }
        return $this->redirect(Url::previous());      
    }

    public function actionMou($id){        
        $path = Yii::getAlias('@frontend/web/uploads/files/');        
        $modelMou = \common\models\MouDetail::findOne(['recruiter_id' => $id]);

        if(file_exists($path.$modelMou->mou_agreement_file) && !empty($modelMou->mou_agreement_file)){
            $completePath = Yii::getAlias($path.$modelMou->mou_agreement_file);            
            return Yii::$app->response->sendFile($completePath, $modelMou->mou_agreement_file, ['inline' => true, 'mimeType' => 'application/pdf']);
        }
    }

    protected function findApplicationModel($id) {
        if (($model = \common\models\StudentCollegeApplied::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}