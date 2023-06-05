<?php

namespace frontend\modules\recruiter\controllers;

use Yii;
use yii\base\Model;
use common\models\Student;
use common\models\StudentForm;
use common\models\StudentCollegeForm;
use common\models\StudentCollegeAttended;
use common\models\UploadFormStudent;
use frontend\models\StudentSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use yii\helpers\Json;
use common\models\Course;
use common\models\CourseSearch;
use yii\web\UploadedFile;

/**
* This is the class for controller "StudentController".
*/
class StudentController extends \frontend\modules\recruiter\controllers\base\StudentController
{
   public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update', 'education-lists', 'grading-lists','courseindex','createcourse','courseview','updatecourse','addcomment'],
                'rules' => [
                    // deny all POST requests
                    /*[
                        'allow' => false,
                        'verbs' => ['POST']
                    ],*/
                    // allow authenticated users
                    [
                        'actions' => ['index', 'create', 'update', 'education-lists', 'grading-lists','courseindex','createcourse','courseview','updatecourse','addcomment'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => '\yii\web\ErrorAction',
            ]
        ];
    }
    
    
     

    public function beforeAction($action) { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }
    
    public function actionShowdocument($id,$c)
    {
         $this->layout = 'inner';
        $model =  Student::findOne($id);
        return $this->render('show_doc', ['model' => $model,'c'=>$c]);
       
    }
    
     public function actionAddcomment($ID) { 
        if(empty(Yii::$app->user->identity->recruiter->id)){
        $this->redirect(['site/logout']);
        }
        $model=new \common\models\RecruiterStudentComment();
        $this->layout = 'inner';

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save(false);
                $notification=new \common\models\Notification();
                $notification->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
                $notification->created_at=date('Y-m-d');
                $notification->module='Comment';
                $notification->name=$model->comment;
                $notification->created_by_id=$model->id; //primary key
                $notification->save(false);
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }
        
        return $this->render('add_comment',['model'=>$model]);
    }
    
 public function actionDownloaddocument($id,$c)
    {
        // echo $c;die;
         $mainpath = Yii::getAlias('@webroot/uploads/doc_student');
         $model =  Student::findOne($id);
        /*$mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $mainroot=$convertPath.'uploads/'.$c;*/
        $mainroot = $mainpath.'/'.$c;
        // echo $mainroot;die;
        if (file_exists($mainroot)) {
            return Yii::$app->response->sendFile($mainroot);
        } else {
            throw new \yii\web\NotFoundHttpException("{$mainroot} is not found!");
        }
    }
    
    
     public function actionCreatecourse()
    {
        $this->layout = 'inner';
        $model = new Course;
        // echo '<pre>';print_r($_POST);die;
        try {
        if ($model->load($_POST) && $model->save(false)) {
               $notification=new \common\models\Notification();
                $notification->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
                $notification->created_at=date('Y-m-d');
                $notification->module='Course Create';
                $notification->name=$model->name;
                $notification->created_by_id=$model->id;
                $notification->save(false);
            $History=new \common\models\History();
            $History->module='recruiter ('.$model->name.')';
            $History->action='create ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $History->created_at=date('Y-m-d');
            $History->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $History->save(false);
            
        return $this->redirect(['courseindex']);
        } elseif (!\Yii::$app->request->isPost) {
        $model->load($_GET);
        }
        } catch (\Exception $e) {
        $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
        $model->addError('_exception', $msg);
        }
        return $this->render('create_course', ['model' => $model]);
    }
    
    
    /* course module code */
    
    public function actionCourseindex()
    {
        // echo Yii::$app->user->identity->recruiter->id;die;
        if(empty(Yii::$app->user->identity->recruiter->id)){
        $this->redirect(['site/logout']);
        }
        $this->layout = 'inner';
        $searchModel  = new CourseSearch;
        $dataProvider = $searchModel->searchrecruiter($_GET);
        Tabs::clearLocalStorage();
        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;
        return $this->render('courseindex', [
        'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
     public function actionUpdatecourse($id)
    {
        $this->layout = 'inner';
        $model = Course::findOne($id);
        if ($model->load($_POST) && $model->save()) {
            
            $notification=new \common\models\Notification();
                $notification=new \common\models\Notification();
            $notification->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $notification->created_at=date('Y-m-d');
            $notification->module='Course Update';
            $notification->name=$model->name;
            $notification->created_by_id=$model->id;
            $notification->save(false);

            $History=new \common\models\History();
            $History->module='recruiter ('.$model->name.')';
            $History->action='edit ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $History->created_at=date('Y-m-d');
            $History->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $History->save(false);
            
            \Yii::$app->getSession()->addFlash('success', 'Course updated successfully');
        // return $this->redirect(Url::previous());
        return $this->redirect(['courseindex']);
        } else {
        return $this->render('create_course', [
        'model' => $model,
        ]);
        }
    }

    public function actionCreate() {
       /*  $mail = Yii::$app->mailer->compose('@common/mail/recruiter/recruiter-invitation') 
                    ->setFrom('noreply@universitybureau.com')
                    ->setTo('salman.u360@gmail.com')
                    ->setSubject('Congratulations...!! You have successfully registered.')
                    // ->setHtmlBody('<p>Thank you..! You Registration is successful with <i>University bureau </i>. You will recieve your login username and password via email after admin approve you.</p>')
                    ->send();
        die;
        $mail = Yii::$app->mailer->compose('@common/mail/recruiter/recruiter-invitation')
        ->setFrom('noreply@universitybureau.com')
        ->setTo('salman.u360@gmail.com')
        ->setSubject('New Student creation')
        ->send();

        die; */
        $this->layout = 'inner';
        $model = new Student;
        $model->scenario = Student::SCENARIO_STUDENT_REGISTER;
        // $model->scenario = Student::SCENARIO_UPDATE;

        try {
            if(Yii::$app->request->isPost){
                if ($model->load($_POST)) {
                     //echo '<pre>';print_r($_FILES);die;
                    $model->portalId=$_POST['Student']['portalId'];
                    $model->intake=$_POST['Student']['intake'];
                    //uncomment if lead is on
                    /*$country_of_interest = implode(',', $model->country_of_interest);
                    $service_of_interest = implode(',', $model->service_of_interest);
                    $model->country_of_interest = $country_of_interest;
                    $model->service_of_interest = $service_of_interest;*/

                    $model->recruiter_id = Yii::$app->user->identity->recruiter->id;
                    $AssignRecuiterRm=\common\models\AssignRecuiterRm::find()->where(['recruiter_id'=>Yii::$app->user->identity->recruiter->id])->one();
                    if(empty($AssignRecuiterRm->rm_id)){
                        $model->rm_id='1';
                    }else{
                        $model->rm_id=$AssignRecuiterRm->rm_id;
                    }
                    $model->comment=$_POST['Student']['comment'];

                    /* multiple new */

                    $workpassportArray=$_FILES['Student']['name']['passport']; //passport
                    $workpassportindex= $workpassportArray[0];
                    if(!empty($workpassportindex)){
                    $model->passport = UploadedFile::getInstances($model, 'passport');
                    if ($model->passport) {
                        foreach ($model->passport as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraypassport[] = $file_name;
                        } 
                        $model->passport = implode(',', $file_name_arraypassport);
                    }
                    } //passport end

                    

                    $workieltsArray=$_FILES['Student']['name']['ielts']; //ielts
                    $workworkieltsindex= $workieltsArray[0];
                    if(!empty($workworkieltsindex)){
                    $model->ielts = UploadedFile::getInstances($model, 'ielts');
                    if ($model->ielts) {
                        foreach ($model->ielts as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arrayielts[] = $file_name;
                        } 
                        $model->ielts = implode(',', $file_name_arrayielts);
                    }
                    } //ielts end

                    $ten_certificateArray=$_FILES['Student']['name']['ten_certificate']; //ten_certificate
                    $ten_certificateArrayindex= $ten_certificateArray[0];
                    if(!empty($ten_certificateArrayindex)){
                    $model->ten_certificate = UploadedFile::getInstances($model, 'ten_certificate');
                    if ($model->ten_certificate) {
                        foreach ($model->ten_certificate as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arrayten[] = $file_name;
                        } 
                        $model->ten_certificate = implode(',', $file_name_arrayten);
                    }
                    } //ten_certificate end


                    $twelve_certificateArray=$_FILES['Student']['name']['twelve_certificate']; //twelve_certificate
                    $twelve_certificateArrayindex= $twelve_certificateArray[0];
                    if(!empty($twelve_certificateArrayindex)){
                    $model->twelve_certificate = UploadedFile::getInstances($model, 'twelve_certificate');
                    if ($model->twelve_certificate) {
                        foreach ($model->twelve_certificate as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraytwelve[] = $file_name;
                        } 
                        $model->twelve_certificate = implode(',', $file_name_arraytwelve);
                    }
                    } //twelve_certificate end

                    $bachelor_marksheetArray=$_FILES['Student']['name']['bachelor_marksheet']; //bachelor_marksheet
                    $bachelor_marksheetArrayindex= $bachelor_marksheetArray[0];
                    if(!empty($bachelor_marksheetArrayindex)){
                    $model->bachelor_marksheet = UploadedFile::getInstances($model, 'bachelor_marksheet');
                    if ($model->bachelor_marksheet) {
                        foreach ($model->bachelor_marksheet as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraybachelor_marksheet[] = $file_name;
                        } 
                        $model->bachelor_marksheet = implode(',', $file_name_arraybachelor_marksheet);
                    }
                    } //bachelor_marksheet end

                    $graduation_certificateArray=$_FILES['Student']['name']['graduation_certificate']; //graduation_certificate
                    $graduation_certificateArrayindex= $graduation_certificateArray[0];
                    if(!empty($graduation_certificateArrayindex)){
                    $model->graduation_certificate = UploadedFile::getInstances($model, 'graduation_certificate');
                    if ($model->graduation_certificate) {
                        foreach ($model->graduation_certificate as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraygraduation[] = $file_name;
                        } 
                        $model->graduation_certificate = implode(',', $file_name_arraygraduation);
                    }
                    } //graduation_certificate end


                    $moiArray=$_FILES['Student']['name']['moi']; //moi
                    $moiArrayindex= $moiArray[0];
                    if(!empty($moiArrayindex)){
                    $model->moi = UploadedFile::getInstances($model, 'moi');
                    if ($model->moi) {
                        foreach ($model->moi as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraymoi[] = $file_name;
                        } 
                        $model->moi = implode(',', $file_name_arraymoi);
                    }
                    } //moi end


                    $master_certificateArray=$_FILES['Student']['name']['master_certificate']; //master_certificate
                    $master_certificateArrayindex= $master_certificateArray[0];
                    if(!empty($master_certificateArrayindex)){
                    $model->master_certificate = UploadedFile::getInstances($model, 'master_certificate');
                    if ($model->master_certificate) {
                        foreach ($model->master_certificate as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraymaster[] = $file_name;
                        } 
                        $model->master_certificate = implode(',', $file_name_arraymaster);
                    }
                    } //master_certificate end

                    $diploma_certificateArray=$_FILES['Student']['name']['diploma_certificate']; //diploma_certificate
                    $diploma_certificateArrayindex= $diploma_certificateArray[0];
                    if(!empty($diploma_certificateArrayindex)){
                    $model->diploma_certificate = UploadedFile::getInstances($model, 'diploma_certificate');
                    if ($model->diploma_certificate) {
                        foreach ($model->diploma_certificate as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraydiplomacer[] = $file_name;
                        } 
                        $model->diploma_certificate = implode(',', $file_name_arraydiplomacer);
                    }
                    } //diploma_certificate end

                    $lorArray=$_FILES['Student']['name']['lor']; //lor
                    $lorArrayindex= $lorArray[0];
                    if(!empty($lorArrayindex)){
                    $model->lor = UploadedFile::getInstances($model, 'lor');
                    if ($model->lor) {
                        foreach ($model->lor as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_array[] = $file_name;
                        } 
                        $model->lor = implode(',', $file_name_array);
                    }
                    } //lor end


                    $updated_cvArray=$_FILES['Student']['name']['updated_cv']; //updated_cv
                    $updated_cvArrayindex= $updated_cvArray[0];
                    if(!empty($updated_cvArrayindex)){
                    $model->updated_cv = UploadedFile::getInstances($model, 'updated_cv');
                    if ($model->updated_cv) {
                        foreach ($model->updated_cv as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraylor[] = $file_name;
                        } 
                        $model->updated_cv = implode(',', $file_name_arraylor);
                    }
                    } //updated_cv end


                    $sopArray=$_FILES['Student']['name']['sop']; //sop
                    $sopArrayindex= $sopArray[0];
                    if(!empty($sopArrayindex)){
                    $model->sop = UploadedFile::getInstances($model, 'sop');
                    if ($model->sop) {
                        foreach ($model->sop as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraysop[] = $file_name;
                        } 
                        $model->sop = implode(',', $file_name_arraysop);
                    }
                    } //sop end

                    
                    /* multiple new end */

                    /*multiple work experince certificate*/
                    $workExperinaceArray=$_FILES['Student']['name']['work_experiance'];
                    $workexpIndex= $workExperinaceArray[0];
                    if(!empty($workexpIndex)){
                    $model->work_experiance = UploadedFile::getInstances($model, 'work_experiance');
                    if ($model->work_experiance) {
                        foreach ($model->work_experiance as $attachmentwork) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $file_name = $attachmentwork->baseName . '.' . $attachmentwork->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachmentwork->baseName . '_'.$count.'.' . $attachmentwork->extension;
                                   $count++;
                                }
                            }
                            $attachmentwork->saveAs($path);
                            $files[] = $path;
                            $file_name_arraywork[] = $file_name;
                        } 
                        $model->work_experiance = implode(',', $file_name_arraywork);
                    }
                    }
                    /*multiple end*/


                    /*multiple other certificate*/
                    $othercertificateArray=$_FILES['Student']['name']['other_certificate'];
                    $other_certificateIndex= $othercertificateArray[0];
                    if(!empty($other_certificateIndex)){
                    $model->other_certificate = UploadedFile::getInstances($model, 'other_certificate');
                    if ($model->other_certificate) {
                        foreach ($model->other_certificate as $attachment) {
                            $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';  
                            $path = $upload_dir . $attachment->baseName . '.' . $attachment->extension;
                            $file_name = $attachment->baseName . '.' . $attachment->extension;
                            $count = 0;
                            {
                                while(file_exists($path)) {
                                   $path = $upload_dir . $attachment->baseName . '_'.$count.'.' . $attachment->extension;
                                   $count++;
                                }
                            }
                            $attachment->saveAs($path);
                            $files[] = $path;
                            $file_name_array1other_certificate[] = $file_name;
                        } 
                        $model->other_certificate = implode(',', $file_name_array1other_certificate);
                    }
                    }


                    /*multiple end*/

                    
          /* ten certificate */
                    $model->lead_status=1;
                    if($model->save(false)){
                        $notification=new \common\models\Notification();
                        $notification->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
                        $notification->created_at=date('Y-m-d');
                        $notification->module='Student Create';
                        $notification->name=$model->first_name;
                        $notification->created_by_id=$model->ID;
                        $notification->save(false);

                        $History=new \common\models\History();
                        $History->module='student ('.$model->first_name.')';
                        $History->action='Create';
                        $History->created_at=date('Y-m-d');
                        $History->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
                        $History->save(false);

                        $leadStatus=\common\models\Student::leadStatus();
                        $country_of_citizenship=\common\models\Country::optsCountry();
                        $referral_source=\common\models\Student::referralSource();
                        $countryInterest=\common\models\Student::countryInterest();
                        $service_of_interest=\common\models\Student::servicesInterest();
                        $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
                        ->setFrom('noreply@universitybureau.com')
                        ->setTo($model->email_id)
                        ->setSubject('New Student creation')
                        ->setHtmlBody('
                        <p>Hello: '.$model->first_name.' the Recuiter '.Yii::$app->user->identity->recruiter->owner_first_name.' added you</p>
                        <p>Recruiter: '.Yii::$app->user->identity->recruiter->owner_first_name.'</p>
                        <p>First Name: '.$model->first_name.'</p>
                        <p>Last Name: '.$model->last_name.'</p>
                        <p>Birth Date: '.date('d-M-Y',strtotime($model->birth_date)).'</p>
                        <p>Email: '.$model->email_id.'</p>
                        <p>Phone: '.$model->phone_no.'</p>
                        <p>Gender: '.$model->gender.'</p>
                        <p>Country of Citizenship: '.$country_of_citizenship[$model->country_of_citizenship].'</p>
                        ')
                        ->send();
                        
                        /*mail to RM*/
                        $AssignRecuiterRm=\common\models\AssignRecuiterRm::find()->where(['recruiter_id'=>Yii::$app->user->identity->recruiter->id])->one();
                        $User=\common\models\User::findOne($AssignRecuiterRm->rm_id);
                        $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
                        ->setFrom('noreply@universitybureau.com')
                        ->setTo($User->email)
                        ->setSubject('New Student creation')
                        ->setHtmlBody('
                        <p>Hello: '.$User->username.' the Recuiter '.Yii::$app->user->identity->recruiter->owner_first_name.' added you</p>
                        <p>Recruiter: '.Yii::$app->user->identity->recruiter->owner_first_name.'</p>
                        <p>First Name: '.$model->first_name.'</p>
                        <p>Last Name: '.$model->last_name.'</p>
                        <p>Birth Date: '.date('d-M-Y',strtotime($model->birth_date)).'</p>
                        <p>Email: '.$model->email_id.'</p>
                        <p>Phone: '.$model->phone_no.'</p>
                        <p>Gender: '.$model->gender.'</p>
                        <p>Country of Citizenship: '.$country_of_citizenship[$model->country_of_citizenship].'</p>
                        ')
                        ->send();
                        /*mail to RM end*/
                        
                         /*$mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
                        ->setFrom('noreply@universitybureau.com')
                        ->setTo($model->email_id)
                        ->setSubject('New Student creation')
                        ->setHtmlBody('
                        <p>First Name: '.$model->first_name.'</p>
                        <p>Last Name: '.$model->last_name.'</p>
                        <p>Birth Date: '.date('d-M-Y',strtotime($model->birth_date)).'</p>
                        <p>Email: '.$model->email_id.'</p>
                        <p>Phone: '.$model->phone_no.'</p>
                        <p>Gender: '.$model->gender.'</p>
                        <p>Country of Citizenship: '.$country_of_citizenship[$model->country_of_citizenship].'</p>
                        <p>Lead Status: '.$leadStatus[$model->lead_status].'</p>
                        <p>Referral Source: '.$referral_source[$model->referral_source].'</p>
                        <p>Country of Interest: '.$countryInterest[$model->country_of_interest].'</p>
                        <p>Service of Interest: '.$service_of_interest[$model->service_of_interest].'</p>
                        ')
                        ->send();*/
                        return $this->redirect(['view', 'ID' => $model->ID]);
                    }
                }
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
    * Lists all Student models.
    * @return mixed
    */
    
    public function uploadFile($filename, $tmpname) {

        $output = [];
        $upload_dir = Yii::getAlias('@webroot').'/uploads/doc_student/';        
        
        if(!empty($filename)){

            $target_file = $upload_dir . basename($filename);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" ) {               
                return $output = [
                    'status' => false,
                    'message' => "Sorry, only JPG, JPEG, PNG, PDF & DOC files are allowed."
                ];
            }
           
           /* if (file_exists($target_file)) {                
                return $output = [
                    'status' => false,
                    'message' => "Sorry, file already exists."
                ];
            }*/

            if (move_uploaded_file($tmpname, $target_file)) {
                return $output = [
                    'status' => true,
                    'message' => "Hurray, File uploaded successfully.",
                    'filename' => $filename
                ];
            } else {
                return $output = [
                    'status' => false,
                    'message' => "Sorry, File can not be uploaded."
                ];
            }
        } else {
            return $output = [
                'status' => false,
                'message' => "Sorry, File not found."
            ];
        } 
    }
    public function actionIndex() {
        
        if(empty(Yii::$app->user->identity->recruiter->id)){
            return $this->redirect(['../site/logout1']);
        }
        $this->layout = 'inner';
        if (Yii::$app->user->isGuest){
        return Yii::$app->getResponse()->redirect(array(Url::to(['site/login'],302)));
        }
        $searchModel  = new StudentSearch;
        $dataProvider = $searchModel->search($_GET);

      //  var_dump(\Yii::$app->user->id);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
    * Updates an existing Student model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $ID
    * @return mixed
    */
    public function actionUpdate12($ID) {
        $this->layout = 'inner';
        $studentModel = new StudentForm();
        $collegeModel = new StudentCollegeForm();
        $studentModel->loadStudentProfile($ID);
        $collegeModel->loadCollegeAttended($ID);

        $model =  Student::findOne($ID);
        $model1 =  Student::findOne($ID);
        $collegeModelexist =  StudentCollegeAttended::find()->where(['student_id'=>$model->ID])->one();
        if($collegeModelexist){
            $collegeModel = $collegeModelexist;
        }else{
            $collegeModel =new StudentCollegeAttended();
        }

        if(Yii::$app->request->isPost) {
             // echo '<pre>';print_r($_FILES);die;
            // echo implode(',', $_POST['StudentForm']['study_permit']);;die;
                echo '<pre>';print_r($_POST);die;
            // $attributes = $studentModel->attributes;
            // $model->attributes=$_POST['StudentForm'];
            $collegeModel->student_id=$ID;
            $collegeModel->institution_country=$_POST['StudentCollegeAttended']['institution_country'];
            $collegeModel->institution_name=$_POST['StudentCollegeAttended']['institution_name'];
            $collegeModel->education_level=$_POST['StudentCollegeAttended']['education_level'];
            $collegeModel->primary_language=$_POST['StudentCollegeAttended']['primary_language'];
            $collegeModel->attended_institution_from=date('Y-m-d',strtotime($_POST['StudentCollegeAttended']['attended_institution_from']));
            $collegeModel->attended_institution_to=date('Y-m-d',strtotime($_POST['StudentCollegeAttended']['attended_institution_to']));
            $collegeModel->degree_name=$_POST['StudentCollegeAttended']['degree_name'];
            $collegeModel->graduated_from_institute=$_POST['StudentCollegeAttended']['graduated_from_institute'];
             $collegeModel->graduation_date=date('Y-m-d',strtotime($_POST['StudentCollegeAttended']['graduation_date']));
            $collegeModel->physical_certificate=$_POST['StudentCollegeAttended']['physical_certificate'];
            $collegeModel->address=$_POST['StudentCollegeAttended']['address'];
            $collegeModel->city=$_POST['StudentCollegeAttended']['city'];
            $collegeModel->province=$_POST['StudentCollegeAttended']['province'];
            $collegeModel->zip_code=$_POST['StudentCollegeAttended']['zip_code'];
            $collegeModel->save(false);
            if(!empty($_POST['StudentForm']['study_permit'])){
             $model->study_permit=implode(',', $_POST['StudentForm']['study_permit']);
            }


         /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['ten_certificate'])){
            $filename = $_FILES['StudentForm']['name']['ten_certificate'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['ten_certificate'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('ten_certificate', $result['filename']);
                }
                }else{
                    $model->ten_certificate=$model1->ten_certificate;
          }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['twelve_certificate'])){
            $filename = $_FILES['StudentForm']['name']['twelve_certificate'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['twelve_certificate'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('twelve_certificate', $result['filename']);
                }
                }else{
                    $model->twelve_certificate=$model1->twelve_certificate;
                }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['passport'])){
            $filename = $_FILES['StudentForm']['name']['passport'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['passport'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('passport', $result['filename']);
                }
                }else{
                    $model->passport=$model1->passport;
                }
         /* ten certificate end*/



          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['ielts'])){
            $filename = $_FILES['StudentForm']['name']['ielts'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['ielts'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('ielts', $result['filename']);
                }
                }else{
                    $model->ielts=$model1->ielts;
                }
         /* ten certificate end*/



          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['graduation_certificate'])){
            $filename = $_FILES['StudentForm']['name']['graduation_certificate'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['graduation_certificate'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('graduation_certificate', $result['filename']);
                }
                }else{
                    $model->graduation_certificate=$model1->graduation_certificate;
                }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['lor'])){
            $filename = $_FILES['StudentForm']['name']['lor'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['lor'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('lor', $result['filename']);
                }
                }else{
                    $model->lor=$model1->lor;
                }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['moi'])){
            $filename = $_FILES['StudentForm']['name']['moi'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['moi'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('moi', $result['filename']);
                }
                }else{
                    $model->moi=$model1->moi;
                }
         /* ten certificate end*/


 /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['diploma_certificate'])){
            $filename = $_FILES['StudentForm']['name']['diploma_certificate'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['diploma_certificate'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('diploma_certificate', $result['filename']);
                }
                }else{
                    $model->diploma_certificate=$model1->diploma_certificate;
                }
         /* ten certificate end*/

          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['sop'])){
            $filename = $_FILES['StudentForm']['name']['sop'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['sop'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('sop', $result['filename']);
                }
                }else{
                    $model->sop=$model1->sop;
                }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['master_certificate'])){
            $filename = $_FILES['StudentForm']['name']['master_certificate'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['master_certificate'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('master_certificate', $result['filename']);
                }
                }else{
                    $model->master_certificate=$model1->master_certificate;
                }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['updated_cv'])){
            $filename = $_FILES['StudentForm']['name']['updated_cv'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['updated_cv'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('updated_cv', $result['filename']);
                }
                }else{
                    $model->updated_cv=$model1->updated_cv;
                }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['work_experiance'])){
            $filename = $_FILES['StudentForm']['name']['work_experiance'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['work_experiance'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('work_experiance', $result['filename']);
                }
                }else{
                    $model->work_experiance=$model1->work_experiance;
                }
         /* ten certificate end*/


          /* ten certificate */
         if(!empty($_FILES['StudentForm']['name']['other_certificate'])){
            $filename = $_FILES['StudentForm']['name']['other_certificate'];
            $filetmpname = $_FILES['StudentForm']['tmp_name']['other_certificate'];
            $result = $studentModel->uploadFile($filename, $filetmpname);
             if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['update', 'ID' => $ID]);
                } else {
                    $model->setAttribute('other_certificate', $result['filename']);
                }
                }else{
                    $model->other_certificate=$model1->other_certificate;
                }
         /* ten certificate end*/


           $model->save(false);
            return $this->redirect(['view', 'ID' => $ID]);
            // $collegeModel->attributes=$_POST['StudentCollegeAttended'];
        return $this->redirect(['update', 'ID' => $ID]);
        }

        return $this->render('update', [
            'model' => $studentModel,
            'collegeModel' => $collegeModel
        ]);

    }
    public function actionUpdate1($ID) {
        $this->layout = 'inner';

        $studentModel = new StudentForm();
        $collegeModel = new StudentCollegeForm();
       
        $studentModel->loadStudentProfile($ID);
        $collegeModel->loadCollegeAttended($ID);
        
        if(Yii::$app->request->isPost) {
            /*echo "<pre>";
            var_dump($studentModel->validate());
            var_dump($studentModel->getErrors());
            die();*/
            
            if ($studentModel->load(Yii::$app->request->post()) && $collegeModel->load(Yii::$app->request->post())) {
               
                //$transaction = \Yii::$app->db->beginTransaction();
                try  {
                    // echo '<pre>';print_r($_POST);die;
                    $collegeModel->saveStudentCollege($ID);
                    $studentModel->saveStudentProfile();
                   //return $this->redirect(Url::previous());
                     return $this->redirect(['update', 'ID' => $ID]);
                    
                    //Yii::$app->session->setFlash('success', "Student updated succesfully");
                   /*  if(!$collegeModel->saveStudentCollege($ID)){
                        $this->addErrors($student->errors);
                        $transaction->rollBack();
                        return $this->redirect(['update', 'ID' => $ID]);
                        Yii::$app->session->setFlash('error', "Student data can't be saved");
                    } else {
                        if( $studentModel->saveStudentProfile() ){
                            $transaction->commit();
                            return $this->redirect(Url::previous());
                        } else {
                            $transaction->rollBack();
                            return false;  
                        }
                    } */
                } catch (\Exception $e) {
                    //$transaction->rollBack();
                    return false;
                }
            }
        }        
      
        return $this->render('update', [
            'model' => $studentModel,
            'collegeModel' => $collegeModel
        ]);
    }
    public function actionUpdate($ID) {
        $this->layout = 'inner';

        $studentModel = new StudentForm();
        $collegeModel = new StudentCollegeForm();
       
        $studentModel->loadStudentProfile($ID);
        $collegeModel->loadCollegeAttended($ID);
        
        if(Yii::$app->request->isPost) {
           
            /*echo "<pre>";
            var_dump($studentModel->validate());
            var_dump($studentModel->getErrors());
            die();*/
            
            if ($studentModel->load(Yii::$app->request->post()) && $collegeModel->load(Yii::$app->request->post())) {
               
                //$transaction = \Yii::$app->db->beginTransaction();
                try  {
                    $collegeModel->saveStudentCollege($ID);
                    $studentModel->saveStudentProfile();
                   //return $this->redirect(Url::previous());
                     return $this->redirect(['view', 'ID' => $ID]);
                    
                    //Yii::$app->session->setFlash('success', "Student updated succesfully");
                   /*  if(!$collegeModel->saveStudentCollege($ID)){
                        $this->addErrors($student->errors);
                        $transaction->rollBack();
                        return $this->redirect(['update', 'ID' => $ID]);
                        Yii::$app->session->setFlash('error', "Student data can't be saved");
                    } else {
                        if( $studentModel->saveStudentProfile() ){
                            $transaction->commit();
                            return $this->redirect(Url::previous());
                        } else {
                            $transaction->rollBack();
                            return false;  
                        }
                    } */
                } catch (\Exception $e) {
                    //$transaction->rollBack();
                    return false;
                }
            }
        }        
      
        return $this->render('update', [
            'model' => $studentModel,
            'collegeModel' => $collegeModel
        ]);
    }

    public function actionDelete($ID) {
        try {
            $this->findModel($ID)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$ID',',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
            Url::remember(null);
            $url = \Yii::$app->session['__crudReturnUrl'];
            \Yii::$app->session['__crudReturnUrl'] = null;

            return $this->redirect($url);
        } else {
           return $this->redirect(['index']);
        }
    }

    /*public function actionLists($id)
    {				
        $posts = \common\models\GradingScheme::find()
				->where(['edu_id' => $id])
				->orderBy('id DESC')
				->all();
				
		if (!empty($posts)) {
			foreach($posts as $post) {
				echo "<option value='".$post->id."'>".$post->name."</option>";
			}
		} else {
			echo "<option>-</option>";
		}
		
    }*/

    public function actionEducationLists() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (!empty($_POST['depdrop_parents'])) {
            
            $parents = $_POST['depdrop_parents'];
            
            if ($parents != null) {
                $country_id = $parents[0];
                $educations = \common\models\LevelEducation::getLevelOfEducationById($country_id);
                
                if (!empty($educations)) {
                    $out = [];
                    foreach($educations as $key => $education){
                        $out[] = [
                            'id' => $key,
                            'name' => $education
                        ];
                    }
                    return ['output'=>$out, 'selected'=> ''];
                }
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function actionGradingLists() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = \common\models\GradingScheme::getGradingScheme($subcat_id);
                $out = [];
                foreach($data as $id => $dt){
                    $out[] = [
                        'id' => $id,
                        'name' => $dt
                    ]; 
                }
                $data = [
                    'out' => $out,
                    'selected' => !empty($out[0]['id']) ? $out[0]['id'] : null
                ];               
               return ['output'=>$data['out']];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

}
