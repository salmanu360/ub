<?php

namespace common\models;

use Yii;
use \common\models\base\Student as BaseStudent;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "student".
 */
class Student extends BaseStudent
{

    const STATUS_NEW_LEAD = 1;
    const STATUS_FOLLOW_UP = 2;
    const STATUS_READY_TO_APPLY = 3;

    const RS_BOOST = 1;
    const RS_REFERRAL_LINK = 2;
    const RS_WALK_IN = 3;
    const RS_FACEBOOK = 4;
    const RS_INSTAGRAM = 5;
    const RS_YOUTUBE = 6;
    const RS_CLIENT = 7;
    const RS_ANOTHER_STUDENT = 8;
    const RS_FRIEND = 9;
    const RS_STAFF = 10;
    const RS_IN_PERSON_EVENT = 11;
    const RS_VIRTUAL_EVENT = 12;
    const RS_IMMIGRATION_AGENT = 13;
    const RS_OTHER = 14;

    const CI_AUSTRALIA = 'australia';
    const CI_CANADA = 'canada';
    const CI_UNITED_KINGDOM = 'uk';
    const CI_USA = 'usa';

    const SI_PROGRAMS = 'programs';
    const SI_SCHOLARSHIPS = 'scholarships';
    const SI_VISA_SERVICES = 'visa-services';
    const SI_INSURANCE = 'insurance';
    const SI_ACCOMODATION = 'accomodation';
    const SI_BANK_ACCOUNTS = 'bank-accounts';
    const SI_TOURISM = 'tourism';
    const SI_OTHER = 'other';
    
    const EXAM_TYPE_NONE = 'none';
    const EXAM_TYPE_LATER = 'later';
    const EXAM_TYPE_TOEFL = 'toefl';
    const EXAM_TYPE_IELTS = 'ielts';
    const EXAM_TYPE_DUOLINGO = 'duolingo_english_test';
    const EXAM_TYPE_PTE = 'pte';

    const SCENARIO_STUDENT_REGISTER = 'student_register';
    const SCENARIO_STUDENT_PROFILE = 'student_profile';
    const SCENARIO_STUDENT_UPDATE = 'student_update';
    
    
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
            [['recruiter_id', 'first_name','last_name', 'birth_date', 'email_id', 'phone_no','referral_source', 'gender','country_of_interest','service_of_interest', 'country_of_citizenship'], 'required'],
            [['passport_no','marital_status','address','city','country','zip_code','country_of_education','grade_scale', 'grade_average', 'refused_visa', 'consent','highest_level_education','grading_scheme'], 'required', 'on' => self::SCENARIO_STUDENT_UPDATE],
            [['recruiter_id', 'country_of_citizenship', 'country', 'country_of_education', 'grade_scale', 'graduated_recent_school', 'have_gre_exam', 'gre_verbal_score', 'gre_verbal_rank', 'gre_quantitative_score', 'gre_quantitative_rank', 'gre_writing_score', 'gre_writing_rank', 'have_gmat_exam', 'gmat_verbal_score', 'gmat_verbal_rank', 'gmat_quantitative_score', 'gmat_quantitative_rank', 'gmat_writing_score', 'gmat_writing_rank', 'gmat_total_score', 'gmat_total_rank', 'refused_visa', 'consent'], 'integer'],
            [['birth_date', 'passport_expiry_date', 'date_of_exam', 'gre_exam_date', 'gmat_exam_date','exact_score_listening', 'exact_score_reading', 'exact_score_writing', 'exact_score_speaking', 'exact_score_overall'], 'safe'],
            [['address', 'details'], 'string'],
            [['first_name', 'middle_name', 'last_name', 'phone_no', 'passport_no'], 'string', 'max' => 20],
            [['email_id'], 'string', 'max' => 65],
            [['gender', 'zip_code'], 'string', 'max' => 10],
            [['first_language'], 'string', 'max' => 30],
            [['marital_status', 'lead_status', 'referral_source', 'city', 'state', 'highest_level_education', 'grading_scheme', 'grade_average', 'english_exam_type', 'study_permit', 'upload_document','ten_certificate','twelve_certificate','passport','ielts','graduation_certificate','lor','moi','sop','diploma_certificate','master_certificate','updated_cv','work_experiance','other_certificate'], 'string', 'max' => 255],
            [['country_of_interest', 'service_of_interest','status'], 'safe'],
        ];
        
       /*  return ArrayHelper::merge(
            parent::rules(),
            [
                [['country_of_interest', 'service_of_interest'], 'safe'],
            ]
        ); */
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_STUDENT_REGISTER] = ['email_id', 'phone_no', 'first_name', 'middle_name', 'last_name', 'birth_date', 'country_of_citizenship', 'gender', 'lead_status', 'referral_source', 'country_of_interest', 'service_of_interest', 'consent'];
        $scenarios[self::SCENARIO_STUDENT_PROFILE] = ['username', 'email', 'password'];
       /* $scenarios[self::SCENARIO_STUDENT_UPDATE] = ['passport_no','marital_status','address','city','country','zip_code','country_of_education','grade_scale', 'grade_average', 'refused_visa', 'consent','highest_level_education','grading_scheme'];*/
        return $scenarios;
    }

    public static function getStudentCount(){ 
        $curr_recruiter =  \Yii::$app->user->identity->recruiter->id;
        
        $students = Student::find()        
        ->where(['recruiter_id' => $curr_recruiter])
        ->all();

        return count($students);  
    }
    
    public static function leadStatus(){
        return [
            self::STATUS_NEW_LEAD => Yii::t('app', 'New Lead'),
            self::STATUS_FOLLOW_UP => Yii::t('app', 'Follow Up'),
            self::STATUS_READY_TO_APPLY => Yii::t('app', 'Ready to apply')
        ];
    }

    public function getLeadStatus(){
        $labels = self::leadStatus();
        if(isset($labels[$this->status])){
            return $labels[$this->status];
        }
        return $labels[self::STATUS_NEW_LEAD];
    }

    public static function referralSource(){
        return [            
            self::RS_BOOST => Yii::t('app', 'Boost'),
            self::RS_REFERRAL_LINK => Yii::t('app', 'Referral Link'),
            self::RS_WALK_IN => Yii::t('app', 'Walk In'), 
            self::RS_FACEBOOK => Yii::t('app', 'Facebook'), 
            self::RS_INSTAGRAM => Yii::t('app', 'Instagram'), 
            self::RS_YOUTUBE => Yii::t('app', 'Youtube'), 
            self::RS_CLIENT => Yii::t('app', 'Client'), 
            self::RS_ANOTHER_STUDENT => Yii::t('app', 'Another Student'), 
            self::RS_FRIEND => Yii::t('app', 'Friend'), 
            self::RS_STAFF => Yii::t('app', 'Staff'), 
            self::RS_IN_PERSON_EVENT => Yii::t('app', 'In-Person Event'), 
            self::RS_VIRTUAL_EVENT => Yii::t('app', 'Virtual Event'), 
            self::RS_IMMIGRATION_AGENT => Yii::t('app', 'Immigration Agent'), 
            self::RS_OTHER => Yii::t('app', 'Other') 
        ];
    }

    public function getReferralSource(){
        $labels = self::referralSource();
        if(isset($labels[$this->source])){
            return $labels[$this->source];
        }
        return $labels[self::RS_BOOST];
    }

    public static function countryInterest(){
        return [
            self::CI_AUSTRALIA => Yii::t('app', 'Australia'),
            self::CI_CANADA => Yii::t('app', 'Canada'),
            self::CI_UNITED_KINGDOM => Yii::t('app', 'United Kingdom'),
            self::CI_USA => Yii::t('app', 'USA')
        ];
    }

    public function getCountryInterest(){
        $labels = self::countryInterest();
        if(isset($labels[$this->country])){
            return $labels[$this->country];
        }
        return $labels[self::CI_AUSTRALIA];
    }

    public static function servicesInterest(){
        return [
            self::SI_PROGRAMS => Yii::t('app', 'Programs'),
            self::SI_SCHOLARSHIPS => Yii::t('app', 'Scholarships'),
            self::SI_VISA_SERVICES => Yii::t('app', 'Visa Services'),
            self::SI_INSURANCE => Yii::t('app', 'Insurance'),
            self::SI_ACCOMODATION => Yii::t('app', 'Accomodation'),
            self::SI_BANK_ACCOUNTS => Yii::t('app', 'Bank Accounts'),
            self::SI_TOURISM => Yii::t('app', 'Tourism'),
            self::SI_OTHER => Yii::t('app', 'Other')
        ];
    }

    public function getServicesInterest(){
        $labels = self::servicesInterest();
        if(isset($labels[$this->serivice])){
            return $labels[$this->serivice];
        }
        return $labels[self::CI_AUSTRALIA];
    }

    public function recruiterEmail(){
        $rec_id = $this->recruiter_id;
        $recruiter =  \common\models\Recruiters::find()->where(['id' => $rec_id])->asArray()->one();
        return $recruiter['email'];
    }

    public function getFullName(){
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }

    public static function englishExamType(){
        return [
            self::EXAM_TYPE_NONE => Yii::t('app', 'I don\'t have this'),
            self::EXAM_TYPE_LATER => Yii::t('app', 'I\'ll provide this later'),
            self::EXAM_TYPE_TOEFL => Yii::t('app', 'TOEFL'),
            self::EXAM_TYPE_IELTS => Yii::t('app', 'IELTS'),
            self::EXAM_TYPE_DUOLINGO => Yii::t('app', 'Duolingo English Test'),
            self::EXAM_TYPE_PTE => Yii::t('app', 'PTE')
        ];
    }

    public function getenglishExamType(){
        $labels = self::englishExamType();
        if(isset($labels[$this->english_exam_type])){
            return $labels[$this->english_exam_type];
        }
        return $labels[self::EXAM_TYPE_NONE];
    }
}