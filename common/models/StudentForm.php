<?php

namespace common\models;

use Yii;
use yii\base\Model;
use \common\models\base\Student as BaseStudent;
use yii\helpers\ArrayHelper;
use common\models\StudentCollegeAttended;
use yii\web\UploadedFile;
use yii\web\HttpException;
use common\models\UploadFormStudent;

/**
 * This is the model class for table "student".
 */
class StudentForm extends Model
{

    public $id;
    public $recruiter_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $birth_date;
    public $email_id;
    public $phone_no;
    public $gender;
    public $country_of_citizenship;
    public $first_language;
    public $marital_status;
    public $lead_status;
    public $referral_source;
    public $country_of_interest;
    public $service_of_interest;
    public $passport_no;
    public $passport_expiry_date;
    public $address;
    public $city;
    public $state;
    public $country;
    public $zip_code;
    public $country_of_education;
    public $highest_level_education;
    public $grading_scheme;
    public $grade_scale;
    public $grade_average;
    public $graduated_recent_school;
    public $english_exam_type;
    public $date_of_exam;
    public $exact_score_listening;
    public $exact_score_reading;
    public $exact_score_writing;
    public $exact_score_speaking;
    public $exact_score_overall;
    public $have_gre_exam;
    public $gre_exam_date;
    public $gre_verbal_score;
    public $gre_verbal_rank;
    public $gre_quantitative_score;
    public $gre_quantitative_rank;
    public $gre_writing_score;
    public $gre_writing_rank;
    public $have_gmat_exam;
    public $gmat_exam_date;
    public $gmat_verbal_score;
    public $gmat_verbal_rank;
    public $gmat_quantitative_score;
    public $gmat_quantitative_rank;
    public $gmat_writing_score;
    public $gmat_writing_rank;
    public $gmat_total_score;
    public $gmat_total_rank;
    public $refused_visa;
    public $study_permit;
    public $details;
    public $upload_document;

    public $ten_certificate;
    public $twelve_certificate;
    public $passport;
    public $ielts;
    public $graduation_certificate;
    public $lor;
    public $moi;
    public $sop;
    public $diploma_certificate;
    public $master_certificate;
    public $updated_cv;
    public $work_experiance;
    public $other_certificate;

    public $consent;

    public $student_id;
    public $institution_country;

    const VISA_NONE = 0;
    const VISA_USA = 1;
    const VISA_CANADA = 2;
    const VISA_UK = 3;
    const VISA_AUSTRALIA = 4;
    const VISA_IRISH = 5;

    
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return [
            [['recruiter_id', 'first_name', 'birth_date', 'email_id', 'phone_no', 'gender', 'country_of_citizenship', 'first_language', 'marital_status', 'passport_no', 'address', 'city', 'country', 'zip_code', 'country_of_education', 'highest_level_education', 'grading_scheme', 'grade_average', 'refused_visa', 'consent'], 'required'],
            [['recruiter_id', 'country_of_citizenship', 'country', 'country_of_education', 'grade_scale', 'graduated_recent_school', 'have_gre_exam', 'gre_verbal_score', 'gre_verbal_rank', 'gre_quantitative_score', 'gre_quantitative_rank', 'gre_writing_score', 'gre_writing_rank', 'have_gmat_exam', 'gmat_verbal_score', 'gmat_verbal_rank', 'gmat_quantitative_score', 'gmat_quantitative_rank', 'gmat_writing_score', 'gmat_writing_rank', 'gmat_total_score', 'gmat_total_rank', 'refused_visa', 'consent'], 'integer'],
            [['birth_date', 'passport_expiry_date', 'date_of_exam', 'gre_exam_date', 'gmat_exam_date', 'grade_scale','exact_score_listening', 'exact_score_reading', 'exact_score_writing', 'exact_score_speaking', 'exact_score_overall'], 'safe'],
            [['address', 'details'], 'string'],
            [['first_name', 'middle_name', 'last_name', 'phone_no', 'passport_no', 'institution_country', 'student_id'], 'string', 'max' => 20],
            [['email_id'], 'string', 'max' => 65],
            [['gender', 'zip_code'], 'string', 'max' => 10],
            [['first_language'], 'string', 'max' => 30],
            [['marital_status', 'lead_status', 'referral_source', 'country_of_interest', 'service_of_interest', 'city', 'state', 'highest_level_education', 'grading_scheme', 'grade_average', 'english_exam_type'], 'string', 'max' => 255],
            //[['study_permit'], 'each','integer'],
            [['upload_document','ten_certificate','twelve_certificate','passport','ielts','graduation_certificate','lor','moi','sop','diploma_certificate','master_certificate','updated_cv','work_experiance','other_certificate'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpeg, jpg, png, pdf, doc, docx', 'maxFiles' => 4],
        ];
    }

    /* public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_STUDENT_REGISTER] = ['email_id', 'phone_no', 'first_name', 'middle_name', 'last_name', 'birth_date', 'country_of_citizenship', 'gender', 'lead_status', 'referral_source', 'country_of_interest', 'service_of_interest', 'consent'];
        $scenarios[self::SCENARIO_STUDENT_PROFILE] = ['username', 'email', 'password'];
        return $scenarios;
    } */ 



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




    public static function studyPermit() {
        return [
            self::VISA_NONE => Yii::t('app', 'I don\'t have this'),
            self::VISA_USA => Yii::t('app', 'USA F1 Visa'),
            self::VISA_CANADA => Yii::t('app', 'Canadian Study Permit or Visitor Visa'),
            self::VISA_UK => Yii::t('app', 'UK Student Visa (Tier 4) or Short Term Study Visa'),
            self::VISA_AUSTRALIA => Yii::t('app', 'Australian Student Visa'),
            self::VISA_IRISH => Yii::t('app', 'Irish Stamp 2')
        ];
    }

    public function getStudyPermit() {
        $labels = self::studyPermit();
        if(isset($labels[$this->study_permit])){
            return $labels[$this->study_permit];
        }
        return $labels[self::VISA_NONE];
    }

    public function recruiterEmail(){
        $rec_id = $this->recruiter_id;
        $recruiter =  \common\models\Recruiters::find()->where(['id' => $rec_id])->asArray()->one();
        return $recruiter['email'];
    }

    public function getIsNewRecord(){
        return (empty($this->id) || empty($this->user_id));
    }

    public function getFullName(){
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }

    public function saveStudentProfile1(){
        if(!$this->validate()){
            return false;
        }

        $student = $this->findModel($this->id);
        $model1 = $this->findModel($this->id);
        
        $attributes = $this->attributes;
        unset($attributes['upload_document']);
        // unset($attributes['ten_certificate']);
        $student->setAttributes($attributes);

        
        if($this->upload()){
            $files = [];
            foreach($this->upload_document as $doc){
                $files[] = $doc->name;
            }
            if(!empty($student->upload_document)){
                array_unshift($files, $student->upload_document);
            }              
            $student->upload_document = implode(',', $files);
        }


        if(!$student->save(false)){
            $this->addErrors($student->errors);
            return false;
        } else {
            return true;
        }

         
    }public function saveStudentProfile(){
        if(!$this->validate()){
            return false;
        }


        $student = $this->findModel($this->id);
        $studentModel = $this->findModel($this->id);
        $model1 = $this->findModel($this->id);
        
        $attributes = $this->attributes;
        

        // unset($attributes['upload_document']);
        // unset($attributes['ten_certificate']);
        $student->setAttributes($attributes);
         // echo '<pre>';print_r($_FILES);die;
        
         /* ====== new multiple===== */
         $ten_certificateArray=$_FILES['StudentForm']['name']['ten_certificate']; //ten_certificate
                    $ten_certificateArrayIndex= $ten_certificateArray[0];
                    if(!empty($ten_certificateArrayIndex)){
                    $this->ten_certificate = UploadedFile::getInstances($this, 'ten_certificate');
                    if ($this->ten_certificate) {
                        foreach ($this->ten_certificate as $attachmentwork) {
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
                            $file_name_arrayten_certificate[] = $file_name;
                        } 
                        $student->ten_certificate = implode(',', $file_name_arrayten_certificate);
                    }
                    }else{
                        $student->ten_certificate=$model1->ten_certificate;
                    }


            $twelve_certificateIndexArray=$_FILES['StudentForm']['name']['twelve_certificate']; //twelve_certificate
            $twelve_certificateIndex= $twelve_certificateIndexArray[0];
            if(!empty($twelve_certificateIndex)){
            $this->twelve_certificate = UploadedFile::getInstances($this, 'twelve_certificate');
            if ($this->twelve_certificate) {
                foreach ($this->twelve_certificate as $attachmentwork) {
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
                    $file_name_arraytwelve_certificate[] = $file_name;
                } 
                $student->twelve_certificate = implode(',', $file_name_arraytwelve_certificate);
            }
            }else{
                $student->twelve_certificate=$model1->twelve_certificate;
            }

            $passportArray=$_FILES['StudentForm']['name']['passport']; //passport
            $passportIndex= $passportArray[0];
            if(!empty($passportIndex)){
            $this->passport = UploadedFile::getInstances($this, 'passport');
            if ($this->passport) {
                foreach ($this->passport as $attachmentwork) {
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
                    $file_name_passport_array[] = $file_name;
                } 
                $student->passport = implode(',', $file_name_passport_array);
            }
            }else{
                $student->passport=$model1->passport;
            }


            $ieltsArray=$_FILES['StudentForm']['name']['ielts']; //ielts
            $ieltsIndex= $ieltsArray[0];
            if(!empty($ieltsIndex)){
            $this->ielts = UploadedFile::getInstances($this, 'ielts');
            if ($this->ielts) {
                foreach ($this->ielts as $attachmentwork) {
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
                    $file_name_ielts_array[] = $file_name;
                } 
                $student->ielts = implode(',', $file_name_ielts_array);
            }
            }else{
                $student->ielts=$model1->ielts;
            }


            $graduation_certificateArray=$_FILES['StudentForm']['name']['graduation_certificate']; //graduation_certificate
            $graduation_certificateIndex= $ieltsArray[0];
            if(!empty($graduation_certificateIndex)){
            $this->graduation_certificate = UploadedFile::getInstances($this, 'graduation_certificate');
            if ($this->graduation_certificate) {
                foreach ($this->graduation_certificate as $attachmentwork) {
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
                    $file_name_graduation_certificate_array[] = $file_name;
                } 
                $student->graduation_certificate = implode(',', $file_name_graduation_certificate_array);
            }
            }else{
                $student->graduation_certificate=$model1->graduation_certificate;
            } //end

            $lorArray=$_FILES['StudentForm']['name']['lor']; //lor
            $lorIndex= $lorArray[0];
            if(!empty($lorIndex)){
            $this->lor = UploadedFile::getInstances($this, 'lor');
            if ($this->lor) {
                foreach ($this->lor as $attachmentwork) {
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
                    $file_name_lor_array[] = $file_name;
                } 
                $student->lor = implode(',', $file_name_lor_array);
            }
            }else{
                $student->lor=$model1->lor;
            } //end

            $moiArray=$_FILES['StudentForm']['name']['moi']; //moi
            $moiIndex= $moiArray[0];
            if(!empty($moiIndex)){
            $this->moi = UploadedFile::getInstances($this, 'moi');
            if ($this->moi) {
                foreach ($this->moi as $attachmentwork) {
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
                    $file_name_moi_array[] = $file_name;
                } 
                $student->moi = implode(',', $file_name_moi_array);
            }
            }else{
                $student->moi=$model1->moi;
            } //end


            $sopArray=$_FILES['StudentForm']['name']['sop']; //sop
            $sopIndex= $sopArray[0];
            if(!empty($sopIndex)){
            $this->sop = UploadedFile::getInstances($this, 'sop');
            if ($this->sop) {
                foreach ($this->sop as $attachmentwork) {
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
                    $file_name_sop_array[] = $file_name;
                } 
                $student->sop = implode(',', $file_name_sop_array);
            }
            }else{
                $student->sop=$model1->sop;
            } //end


            $diploma_certificateArray=$_FILES['StudentForm']['name']['diploma_certificate']; //diploma_certificate
            $diploma_certificateIndex= $diploma_certificateArray[0];
            if(!empty($diploma_certificateIndex)){
            $this->diploma_certificate = UploadedFile::getInstances($this, 'diploma_certificate');
            if ($this->diploma_certificate) {
                foreach ($this->diploma_certificate as $attachmentwork) {
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
                    $file_name_diploma_certificate_array[] = $file_name;
                } 
                $student->diploma_certificate = implode(',', $file_name_diploma_certificate_array);
            }
            }else{
                $student->diploma_certificate=$model1->diploma_certificate;
            } //end


            $master_certificateArray=$_FILES['StudentForm']['name']['master_certificate']; //master_certificate
            $master_certificateIndex= $master_certificateArray[0];
            if(!empty($diplommaster_certificateIndexa_certificateIndex)){
            $this->master_certificate = UploadedFile::getInstances($this, 'master_certificate');
            if ($this->master_certificate) {
                foreach ($this->master_certificate as $attachmentwork) {
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
                    $file_name_master_certificate_array[] = $file_name;
                } 
                $student->master_certificate = implode(',', $file_name_master_certificate_array);
            }
            }else{
                $student->master_certificate=$model1->master_certificate;
            } //end

            $updated_cvArray=$_FILES['StudentForm']['name']['updated_cv']; //updated_cv
            $updated_cvIndex= $updated_cvArray[0];
            if(!empty($updated_cvIndex)){
            $this->updated_cv = UploadedFile::getInstances($this, 'updated_cv');
            if ($this->updated_cv) {
                foreach ($this->updated_cv as $attachmentwork) {
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
                    $file_name_updated_cv_array[] = $file_name;
                } 
                $student->updated_cv = implode(',', $file_name_updated_cv_array);
            }
            }else{
                $student->updated_cv=$model1->updated_cv;
            } //end
         /* ====== new multiple===== end */
        


                    /*multiple work experince certificate*/
                    $workExperinaceArray=$_FILES['StudentForm']['name']['work_experiance'];
                    $workexpIndex= $workExperinaceArray[0];
                    if(!empty($workexpIndex)){
                    $this->work_experiance = UploadedFile::getInstances($this, 'work_experiance');
                       // echo '<pre>';print_r($this->work_experiance);die;
                    if ($this->work_experiance) {
                        foreach ($this->work_experiance as $attachmentwork) {
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
                            $file_name_work_experiancearray[] = $file_name;
                        } 
                        $student->work_experiance = implode(',', $file_name_work_experiancearray);
                    }
                    }else{
                        $student->work_experiance=$model1->work_experiance;
                    }
                    /*multiple end*/

         /*multiple other certificate*/
                    $othercertificateArray=$_FILES['StudentForm']['name']['other_certificate'];
                    $other_certificateIndex= $othercertificateArray[0];
                    if(!empty($other_certificateIndex)){
                    $this->other_certificate = UploadedFile::getInstances($this, 'other_certificate');
                    if ($this->other_certificate) {
                        foreach ($this->other_certificate as $attachment) {
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
                            $file_name_array1other[] = $file_name;
                        } 
                        $student->other_certificate = implode(',', $file_name_array1other);
                    }
                    }else{
                        $student->other_certificate=$model1->other_certificate;
                    }
                    /*multiple end*/

         


        if(!$student->save(false)){
            $this->addErrors($student->errors);
            return false;
        } else {
            $notification=new \common\models\Notification();
            $notification->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $notification->created_at=date('Y-m-d');
            $notification->module='student Update';
            $notification->name=$student->first_name;
            $notification->created_by_id=$student->ID;
            $notification->save(false);

            $History=new \common\models\History();
            $History->module='student ('.$student->first_name.')';
            $History->action='Update ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $History->created_at=date('Y-m-d');
            $History->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->owner_first_name.')';
            $History->save(false);
            return true;
        }

         
    }

    

     public function ten_certificate()
    {
        $upload_dir = Yii::getAlias('@webroot').'/uploads/docs/';
        
        if ($this->validate()) {
            $this->ten_certificate = UploadedFile::getInstances($this, 'ten_certificate');
            if(empty($this->ten_certificate)){
                return false;
            }
            
            foreach ($this->ten_certificate as $file) {                
                $file->saveAs($upload_dir . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function upload()
    {
        $upload_dir = Yii::getAlias('@webroot').'/uploads/docs/';
        
        if ($this->validate()) {
            $this->upload_document = UploadedFile::getInstances($this, 'upload_document');
            if(empty($this->upload_document)){
                return false;
            }
            
            foreach ($this->upload_document as $file) {                
                $file->saveAs($upload_dir . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function upload_documents() {
        if (!$this->validate()) {
            return false;
        }
        
        $upload_dir = Yii::getAlias('@webroot').'/uploads/docs/';
        $this->upload_document = UploadedFile::getInstances($this, 'upload_document');        
        
        if ($this->upload_document) { 
            $docs = [];
            foreach ($this->upload_document as $document) {
                $filename = $document->baseName.'.'.$document->extension;
                if($document->saveAs($upload_dir . $filename)){
                    $docs[] = $filename;
                } else {
                    $docs[] = null;
                }
            }
            if(!empty($docs)){
                return implode(',', $docs);
            } else {
                return false;
            }
        } else {
            return false;
        }         
    }

    public function loadStudentProfile($id){
        $student = $this->findModel($id);
       
        $this->id = $student->ID;
        $this->recruiter_id = $student->recruiter_id;
        $this->first_name = $student->first_name;
        $this->middle_name = $student->middle_name;
        $this->last_name = $student->last_name;
        $this->birth_date = $student->birth_date;
        $this->first_language = $student->first_language;
        $this->country_of_citizenship = $student->country_of_citizenship;
        $this->passport_no = $student->passport_no;
        $this->passport_expiry_date = $student->passport_expiry_date;
        $this->marital_status = $student->marital_status;
        $this->gender = $student->gender;
        $this->address = $student->address;
        $this->city = $student->city;
        $this->country = $student->country;
        $this->state = $student->state;
        $this->zip_code = $student->zip_code;
        $this->email_id = $student->email_id;
        $this->phone_no = $student->phone_no;
        $this->country_of_education = $student->country_of_education;
        $this->highest_level_education = $student->highest_level_education;
        $this->grading_scheme = $student->grading_scheme;
        $this->grade_scale = $student->grade_scale;
        $this->grade_average = $student->grade_average;
        $this->graduated_recent_school = $student->graduated_recent_school;
        $this->english_exam_type = $student->english_exam_type;
        $this->date_of_exam = $student->date_of_exam;
        $this->exact_score_reading = $student->exact_score_reading;
        $this->exact_score_listening = $student->exact_score_listening;
        $this->exact_score_speaking = $student->exact_score_speaking;
        $this->exact_score_writing = $student->exact_score_writing;
        $this->exact_score_overall = $student->exact_score_overall;
        $this->have_gre_exam = $student->have_gre_exam;
        $this->gre_exam_date = $student->gre_exam_date;
        $this->gre_verbal_score = $student->gre_verbal_score;
        $this->gre_verbal_rank = $student->gre_verbal_rank;
        $this->gre_quantitative_score = $student->gre_quantitative_score;
        $this->gre_quantitative_rank = $student->gre_quantitative_rank;
        $this->gre_writing_score = $student->gre_writing_score;
        $this->gre_writing_rank = $student->gre_writing_rank;
        $this->have_gmat_exam = $student->have_gmat_exam;
        $this->gmat_exam_date = $student->gmat_exam_date;
        $this->gmat_verbal_score = $student->gmat_verbal_score;
        $this->gmat_verbal_rank = $student->gmat_verbal_rank;
        $this->gmat_quantitative_score = $student->gmat_quantitative_score;
        $this->gmat_quantitative_rank = $student->gmat_quantitative_rank;
        $this->gmat_writing_score = $student->gmat_writing_score;
        $this->gmat_writing_rank = $student->gmat_writing_rank;
        $this->gmat_total_score = $student->gmat_total_score;
        $this->gmat_total_rank = $student->gmat_total_rank;
        $this->refused_visa = $student->refused_visa;
        $this->study_permit = $student->study_permit;
        $this->details = $student->details;
        $this->upload_document = $student->upload_document;
        $this->ten_certificate = $student->ten_certificate;
        $this->twelve_certificate = $student->twelve_certificate;
        $this->passport = $student->passport;
        $this->ielts = $student->ielts;
        $this->graduation_certificate = $student->graduation_certificate;
        $this->lor = $student->lor;
        $this->moi = $student->moi;
        $this->sop = $student->sop;
        $this->diploma_certificate = $student->diploma_certificate;
        $this->master_certificate = $student->master_certificate;
        $this->updated_cv = $student->updated_cv;
        $this->work_experiance = $student->work_experiance;
        $this->other_certificate = $student->other_certificate;
        $this->consent = $student->consent;

        return $this;
    }
    
    
    public function levelEducationById($id){
       $data = ArrayHelper::map(levelEducation ::find()->where(['country_id' => $id])->all(), 'id', 'edu_name');       
       return $data;
    }

    public function gradingSchemeById($id){
        $data = ArrayHelper::map(GradingScheme ::find()->where(['edu_id' => $id])->all(), 'id', 'name');       
        return $data;
     }

    protected function findModel($id) {
        if (($model = Student::find()->andWhere(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    protected function findStudentCollegeModel($id) {
        if (($model = StudentCollegeAttended::find()->andWhere(['student_id' => $id])->one()) !== null) {           
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}