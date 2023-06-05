<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use \common\models\Recruiters as Recruiters;
use yii\web\UploadedFile;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * This is the model class for table "recruiters".
 */
class RecruitersForm extends Model
{
    /* Company Information */
    public $user_id;
    public $company_name;
    public $email;
    public $website;
    public $facebook_page;
    public $instagram_handle;
    public $twitter_handle;
    public $linked_url;

    /* Conatct Information */
    public $main_source;
    public $owner_first_name;
    public $owner_last_name;
    public $street_address;
    public $city;
    public $state;
    public $country;
    public $postal_code;
    public $phone;
    public $cellphone;
    public $sky_id;
    public $whatsapp_id;
    public $refer_name;

    /* Recruitmnet Detail */
    public $recut_form;
    public $stu_abroad_year;
    public $aver_service_fee;
    public $confirmation;
    public $client_service;
    public $inst_rep;
    public $edu_org_bl;
    public $add_comment;
    public $refrence_name;
    public $ref_stu_name;
    public $ref_business_email;
    public $ref_phone;
    public $ref_website;
    public $comp_logo;
    public $bus_certificate;
    
    public $begin_rec_time;
    public $market_methods;
    public $refer_stu_univer;
    public $rep_students;
    public $status;
    public $ref_no;
    public $acceptance;
    public $represent_student = [];

    const CANADIAN_REPRESENTED = 1;
	const AMERICAN_REPRESENTED = 2;
	const OTHER_REPRESENTED = 3;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    public function rules() {
        return [
            [['user_id', 'status', 'main_source', 'country', 'postal_code', 'recut_form', 'stu_abroad_year', 'aver_service_fee', 'refer_stu_univer', 'confirmation', 'acceptance'], 'integer'],
            [['ref_no', 'status', 'company_name', 'rep_students', 'email', 'main_source', 'owner_first_name', 'owner_last_name', 'street_address', 'city', 'country', 'phone', 'aver_service_fee'], 'required'],
            [['street_address', 'client_service', 'inst_rep', 'edu_org_bl', 'add_comment'], 'string'],
            [['ref_no', 'phone', 'cellphone', 'ref_phone'], 'string', 'max' => 20],
            [['company_name', 'owner_first_name', 'owner_last_name', 'city', 'state', 'refer_name', 'refrence_name', 'ref_stu_name', 'ref_business_email', 'comp_logo', 'bus_certificate'], 'string', 'max' => 120],
            [['email'], 'string', 'max' => 50],
            [['website', 'sky_id', 'whatsapp_id'], 'string', 'max' => 40],
            [['facebook_page', 'instagram_handle', 'twitter_handle', 'begin_rec_time'], 'string', 'max' => 150],
            [['linked_url'], 'string', 'max' => 240],
            //[['market_methods'], 'string', 'max' => 30],
            ['market_methods', 'each', 'rule' => ['integer', 'skipOnEmpty' => false]],
            [['ref_website'], 'string', 'max' => 220],
            [['comp_logo', 'bus_certificate'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpeg, jpg, png, pdf, doc, docx'],
            [['phone'], PhoneInputValidator::className()],
            [['acceptance'], 'required', 'requiredValue' => 1, 'message' => 'Please accept the terms and conditions.'],
        ];
    }

    /* public function scenarios() {
        return [
            'update' => ['company_name', 'email', 'website', 'facebook_page', 'instagram_handle','twitter_handle', 'linked_url'],
            //'default' => ['name', 'email', 'phone_no', 'address', 'username','password']
        ];
    } */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'ref_no' => 'Ref No',
            'status' => 'Status',
            'company_name' => 'Company Name',
            'email' => 'Email',
            'website' => 'Website',
            'facebook_page' => 'Facebook Page Name',
            'instagram_handle' => 'Instagram Handle',
            'twitter_handle' => 'Twitter Handle',
            'linked_url' => 'Linkedin URL',
            'main_source' => 'Main Source of Students',
            'owner_first_name' => 'Owner\'s First Name',
            'owner_last_name' => 'Owner\'s Last Name',
            'street_address' => 'Street Address',
            'city' => 'City',
            'state' => 'State/Province',
            'country' => 'Country',
            'postal_code' => 'Postal Code',
            'phone' => 'Phone',
            'cellphone' => 'Cellphone',
            'sky_id' => 'Skype ID',
            'whatsapp_id' => 'Whatsapp ID',
            'refer_name' => 'Has anyone from ApplyBoard helped or referred you? If yes, who?',
            'begin_rec_time' => 'When did you begin recruiting students?',
            'client_service' => 'What services do you provide to your clients?',
            'rep_students' => 'Rep Students',
            'inst_rep' => 'What institutions are you representing?',
            'edu_org_bl' => 'What educational associations or groups does your organization belong to?',
            'recut_form' => 'Where do you recruit from?',
            'stu_abroad_year' => 'Approximately how many students do you send abroad per year?',
            'market_methods' => 'What type of marketing methods do you undertake?',
            'aver_service_fee' => 'Average Service Fee',
            'refer_stu_univer' => 'Please provide an estimate of the number of students you will refer to University Bureau.',
            'add_comment' => 'Additional Comments',
            'refrence_name' => 'Reference Name',
            'ref_stu_name' => 'Reference Institution Name',
            'ref_business_email' => 'Reference Business Email',
            'ref_phone' => 'Reference Phone',
            'ref_website' => 'Reference Website',
            'comp_logo' => 'Company Logo',
            'bus_certificate' => 'Business Certificate',
            'confirmation' => 'I declare that the information contained in this application and all supporting documentation is true and correct.',
            'acceptance' => 'Acceptance',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function save_recruiter(){
        $recruiter = new Recruiters();
        
        $recruiter->status = self::STATUS_INACTIVE;
        $recruiter->ref_no = $this->generateRefNo();
        $recruiter->main_source = $this->main_source;
        $recruiter->country = $this->country;
        $recruiter->aver_service_fee = $this->aver_service_fee;
        $recruiter->company_name = $this->company_name;
        $recruiter->email = $this->email;
        $recruiter->owner_first_name = $this->owner_first_name;
        $recruiter->owner_last_name = $this->owner_last_name;
        $recruiter->street_address = $this->street_address;
        $recruiter->city = $this->city;
        $recruiter->phone = $this->phone;
         
        $recruiter->website = $this->website;
        $recruiter->facebook_page = $this->facebook_page;
        $recruiter->instagram_handle = $this->instagram_handle;
        $recruiter->twitter_handle = $this->twitter_handle;
        $recruiter->linked_url = $this->linked_url;        
        $recruiter->state = $this->state;        
        $recruiter->postal_code = $this->postal_code;         
        $recruiter->cellphone = $this->cellphone;
        $recruiter->sky_id = $this->sky_id;
        $recruiter->whatsapp_id = $this->whatsapp_id;
        $recruiter->refer_name = $this->refer_name;

        $recruiter->recut_form = $this->recut_form;
        $recruiter->stu_abroad_year = $this->stu_abroad_year;
        $recruiter->client_service = $this->client_service;
        $recruiter->inst_rep = $this->inst_rep;
        $recruiter->edu_org_bl = $this->edu_org_bl;
        $recruiter->add_comment = $this->add_comment;
        $recruiter->refrence_name = $this->refrence_name;
        $recruiter->ref_stu_name = $this->ref_stu_name;
        $recruiter->ref_business_email = $this->ref_business_email;
        $recruiter->ref_phone = $this->ref_phone;
        $recruiter->ref_website = $this->ref_website;
        $recruiter->begin_rec_time = $this->begin_rec_time;
        $recruiter->market_methods = !empty($this->market_methods) ? implode(',', $this->market_methods) : null;
        $recruiter->refer_stu_univer = $this->refer_stu_univer;        
        $recruiter->rep_students = implode(',', $this->rep_students);        
        $recruiter->comp_logo = $this->upload_company_logo();

        $recruiter->bus_certificate = $this->upload_business_certificate();
        $recruiter->confirmation = (int)$this->confirmation;
        $recruiter->acceptance = !empty($this->acceptance) ? $this->acceptance : null;        
        
        if(!$recruiter->validate()){
            $error = $recruiter->getErrors();
            $this->addErrors($error);
            return false;
        }
        
        if($recruiter->save()){
            $notification=new \common\models\Notification();
            $notification->created_by='New Recruiter';
            $notification->created_at=date('Y-m-d');
            $notification->module='Recruiter Register';
            $notification->name=$recruiter->owner_first_name;
            $notification->save(false);

            $History=new \common\models\History();
            $History->module='Recruiter ('.$recruiter->owner_first_name.')';
            $History->action='New';
            $History->created_at=date('Y-m-d');
            $History->created_by='New Recruiter';
            $History->save(false);
            return true;
        } else {
            return false;
        }

    }


/*public function ten_certificate() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->ten_certificate = UploadedFile::getInstance($this, 'ten_certificate');
     
    if ($this->ten_certificate) { 
        $filename = $this->ten_certificate->baseName.'.'.$this->ten_certificate->extension;
        
        if($this->ten_certificate->saveAs($upload_dir . $filename)){
            return $this->ten_certificate->name;
        }
        else{
            return false;
        }            
    }         
}


public function twelve_certificate() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->twelve_certificate = UploadedFile::getInstance($this, 'twelve_certificate');
     
    if ($this->twelve_certificate) { 
        $filename = $this->twelve_certificate->baseName.'.'.$this->twelve_certificate->extension;
        
        if($this->twelve_certificate->saveAs($upload_dir . $filename)){
            return $this->twelve_certificate->name;
        }
        else{
            return false;
        }            
    }         
}


public function passport() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->passport = UploadedFile::getInstance($this, 'passport');
     
    if ($this->passport) { 
        $filename = $this->passport->baseName.'.'.$this->passport->extension;
        
        if($this->passport->saveAs($upload_dir . $filename)){
            return $this->passport->name;
        }
        else{
            return false;
        }            
    }         
}


public function ielts() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->ielts = UploadedFile::getInstance($this, 'ielts');
     
    if ($this->ielts) { 
        $filename = $this->ielts->baseName.'.'.$this->ielts->extension;
        
        if($this->ielts->saveAs($upload_dir . $filename)){
            return $this->ielts->name;
        }
        else{
            return false;
        }            
    }         
}


public function graduation_certificate() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->graduation_certificate = UploadedFile::getInstance($this, 'graduation_certificate');
     
    if ($this->graduation_certificate) { 
        $filename = $this->graduation_certificate->baseName.'.'.$this->graduation_certificate->extension;
        
        if($this->graduation_certificate->saveAs($upload_dir . $filename)){
            return $this->graduation_certificate->name;
        }
        else{
            return false;
        }            
    }         
}

public function lor() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->lor = UploadedFile::getInstance($this, 'lor');
     
    if ($this->lor) { 
        $filename = $this->lor->baseName.'.'.$this->lor->extension;
        
        if($this->lor->saveAs($upload_dir . $filename)){
            return $this->lor->name;
        }
        else{
            return false;
        }            
    }         
}

public function moi() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->moi = UploadedFile::getInstance($this, 'moi');
     
    if ($this->moi) { 
        $filename = $this->moi->baseName.'.'.$this->moi->extension;
        
        if($this->moi->saveAs($upload_dir . $filename)){
            return $this->moi->name;
        }
        else{
            return false;
        }            
    }         
}

public function sop() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->sop = UploadedFile::getInstance($this, 'sop');
     
    if ($this->sop) { 
        $filename = $this->sop->baseName.'.'.$this->sop->extension;
        
        if($this->sop->saveAs($upload_dir . $filename)){
            return $this->sop->name;
        }
        else{
            return false;
        }            
    }         
}

public function diploma_certificate() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->diploma_certificate = UploadedFile::getInstance($this, 'diploma_certificate');
     
    if ($this->diploma_certificate) { 
        $filename = $this->diploma_certificate->baseName.'.'.$this->diploma_certificate->extension;
        
        if($this->diploma_certificate->saveAs($upload_dir . $filename)){
            return $this->diploma_certificate->name;
        }
        else{
            return false;
        }            
    }         
}


public function master_certificate() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->master_certificate = UploadedFile::getInstance($this, 'master_certificate');
     
    if ($this->master_certificate) { 
        $filename = $this->master_certificate->baseName.'.'.$this->master_certificate->extension;
        
        if($this->master_certificate->saveAs($upload_dir . $filename)){
            return $this->master_certificate->name;
        }
        else{
            return false;
        }            
    }         
}

public function updated_cv() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->updated_cv = UploadedFile::getInstance($this, 'updated_cv');
     
    if ($this->updated_cv) { 
        $filename = $this->updated_cv->baseName.'.'.$this->updated_cv->extension;
        
        if($this->updated_cv->saveAs($upload_dir . $filename)){
            return $this->updated_cv->name;
        }
        else{
            return false;
        }            
    }         
}
public function work_experiance() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->work_experiance = UploadedFile::getInstance($this, 'work_experiance');
     
    if ($this->work_experiance) { 
        $filename = $this->work_experiance->baseName.'.'.$this->work_experiance->extension;
        
        if($this->work_experiance->saveAs($upload_dir . $filename)){
            return $this->work_experiance->name;
        }
        else{
            return false;
        }            
    }         
}
public function other_certificate() {  
    $upload_dir = Yii::getAlias('@webroot').'/uploads/';
    $this->other_certificate = UploadedFile::getInstance($this, 'other_certificate');
     
    if ($this->other_certificate) { 
        $filename = $this->other_certificate->baseName.'.'.$this->other_certificate->extension;
        
        if($this->other_certificate->saveAs($upload_dir . $filename)){
            return $this->other_certificate->name;
        }
        else{
            return false;
        }            
    }         
}*/

    public function generateRefNo($prefix = 'UB-'){
		return $prefix.mt_rand(1, time());	
		//return $prefix.rand();
	}

    public function upload_company_logo() {  
        $upload_dir = Yii::getAlias('@webroot').'/uploads/';
        $this->comp_logo = UploadedFile::getInstance($this, 'comp_logo');
         
        if ($this->comp_logo) { 
            $filename = $this->comp_logo->baseName.'.'.$this->comp_logo->extension;
            
            if($this->comp_logo->saveAs($upload_dir . $filename)){
                return $this->comp_logo->name;
            }
            else{
                return false;
            }            
        }         
    }

    public function upload_business_certificate() {  
        $upload_dir = Yii::getAlias('@webroot').'/uploads/';
        $this->bus_certificate = UploadedFile::getInstance($this, 'bus_certificate');
         
        if ($this->bus_certificate) { 
            $filename = $this->bus_certificate->baseName.'.'.$this->bus_certificate->extension;
            
            if($this->bus_certificate->saveAs($upload_dir . $filename)){
                return $this->bus_certificate->name;
            }
            else{
                return false;
            }            
        }         
    }

    /* new code */
   
    /* new code end */

    public static function optionRepresentStudents(){
        return [
            self::CANADIAN_REPRESENTED => Yii::t('app', 'Canadian Schools Represented'),
            self::AMERICAN_REPRESENTED => Yii::t('app', 'American Schools Represented'),             
            self::OTHER_REPRESENTED => Yii::t('app', 'Represents Other Countries'),             
        ];
    }


    public function uploadImage($filename, $tmpname) {
        $output = [];
        $upload_dir = Yii::getAlias('@webroot').'/uploads/';        
        
        if(!empty($filename)){
            $target_file = $upload_dir . basename($filename);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            $check = getimagesize($tmpname);

            
            if($check === false) {
                return $output = [
                    'status' => false,
                    'message' => "Invalid Image"
                ];
            } 
           
             if (file_exists($target_file)) {                
                return $output = [
                    'status' => false,
                    'message' => "Sorry, file already exists."
                ];
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {               
                return $output = [
                    'status' => false,
                    'message' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
                ];
            }

            if (move_uploaded_file($tmpname, $target_file)) {
                return $output = [
                    'status' => true,
                    'message' => "Hurray, Image uploaded successfully.",
                    'filename' => $filename
                ];
            } else {
                return $output = [
                    'status' => false,
                    'message' => "Sorry, Image can not be uploaded."
                ];
            }
        } else {
            return $output = [
                'status' => false,
                'message' => "Sorry, Image not found."
            ];
        } 
    }

    public function uploadFile($filename, $tmpname) {
        $output = [];
        $upload_dir = Yii::getAlias('@webroot').'/uploads/';        
        
        if(!empty($filename)){
            $target_file = $upload_dir . basename($filename);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" ) {               
                return $output = [
                    'status' => false,
                    'message' => "Sorry, only JPG, JPEG, PNG, PDF & DOC files are allowed."
                ];
            }
           
            if (file_exists($target_file)) {                
                return $output = [
                    'status' => false,
                    'message' => "Sorry, file already exists."
                ];
            }

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
}