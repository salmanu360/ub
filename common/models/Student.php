<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "student".
 *
 * @property int $ID
 * @property int $recruiter_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string $birth_date
 * @property string $email_id
 * @property string $phone_no
 * @property string $gender
 * @property int $country_of_citizenship
 * @property string|null $first_language
 * @property string|null $marital_status
 * @property string|null $lead_status
 * @property string|null $referral_source
 * @property string|null $country_of_interest
 * @property string|null $service_of_interest
 * @property string|null $passport_no
 * @property string|null $passport_expiry_date
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property int|null $country
 * @property string|null $zip_code
 * @property int|null $country_of_education
 * @property string|null $highest_level_education
 * @property string|null $grading_scheme
 * @property int|null $grade_scale
 * @property string|null $grade_average
 * @property int|null $graduated_recent_school
 * @property string|null $english_exam_type
 * @property string|null $date_of_exam
 * @property string|null $exact_score_listening
 * @property string|null $exact_score_reading
 * @property float|null $exact_score_writing
 * @property string|null $exact_score_speaking
 * @property string|null $exact_score_overall
 * @property int|null $have_gre_exam
 * @property string|null $gre_exam_date
 * @property int|null $gre_verbal_score
 * @property int|null $gre_verbal_rank
 * @property int|null $gre_quantitative_score
 * @property int|null $gre_quantitative_rank
 * @property int|null $gre_writing_score
 * @property int|null $gre_writing_rank
 * @property int|null $have_gmat_exam
 * @property string|null $gmat_exam_date
 * @property int|null $gmat_verbal_score
 * @property int|null $gmat_verbal_rank
 * @property int|null $gmat_quantitative_score
 * @property int|null $gmat_quantitative_rank
 * @property int|null $gmat_writing_score
 * @property int|null $gmat_writing_rank
 * @property int|null $gmat_total_score
 * @property int|null $gmat_total_rank
 * @property int $refused_visa
 * @property string|null $study_permit
 * @property string|null $details
 * @property string|null $upload_document
 * @property string|null $ten_certificate
 * @property string|null $twelve_certificate
 * @property string|null $passport
 * @property string|null $ielts
 * @property string|null $graduation_certificate
 * @property string|null $lor
 * @property string|null $moi
 * @property string|null $sop
 * @property string|null $diploma_certificate
 * @property string|null $master_certificate
 * @property string|null $updated_cv
 * @property string|null $work_experiance
 * @property string|null $other_certificate
 * @property string|null $bachelor_marksheet
 * @property int $consent
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $status
 *
 * @property StudentSchoolAttended $studentSchoolAttended
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    public $intake;
    public $bachelor_marksheet;
    public $diploma_marksheet;
    public $created_date;
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recruiter_id', 'first_name','intake', 'birth_date', 'email_id','passport_no', 'phone_no', 'gender', 'country_of_citizenship', 'consent'], 'required'],
            [['recruiter_id', 'country_of_citizenship', 'country', 'country_of_education', 'grade_scale', 'graduated_recent_school', 'have_gre_exam', 'gre_verbal_score', 'gre_verbal_rank', 'gre_quantitative_score', 'gre_quantitative_rank', 'gre_writing_score', 'gre_writing_rank', 'have_gmat_exam', 'gmat_verbal_score', 'gmat_verbal_rank', 'gmat_quantitative_score', 'gmat_quantitative_rank', 'gmat_writing_score', 'gmat_writing_rank', 'gmat_total_score', 'gmat_total_rank', 'refused_visa', 'consent', 'created_at', 'updated_at', 'status','assign_application_team','rm_id'], 'integer'],
            [['birth_date', 'passport_expiry_date', 'date_of_exam', 'gre_exam_date', 'gmat_exam_date','intake','assign_application_team','rm_id'], 'safe'],
            [['address', 'details'], 'string'],
            [['exact_score_writing'], 'number'],
            [['first_name', 'middle_name', 'last_name', 'phone_no', 'passport_no'], 'string', 'max' => 20],
            [['email_id'], 'string', 'max' => 65],
            [['gender', 'zip_code'], 'string', 'max' => 10],
            [['first_language'], 'string', 'max' => 30],
            [['marital_status', 'lead_status', 'referral_source', 'country_of_interest', 'service_of_interest', 'city', 'state', 'highest_level_education', 'grading_scheme', 'grade_average', 'english_exam_type', 'exact_score_listening', 'exact_score_reading', 'exact_score_speaking', 'exact_score_overall', 'study_permit', 'upload_document', 'ten_certificate', 'twelve_certificate', 'passport', 'ielts', 'graduation_certificate', 'lor', 'moi', 'sop', 'diploma_certificate', 'master_certificate', 'updated_cv', 'work_experiance', 'other_certificate','diploma_marksheet','bachelor_marksheet'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'recruiter_id' => 'Recruiter',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'birth_date' => 'Birth Date',
            'email_id' => 'Email',
            'phone_no' => 'Phone No',
            'gender' => 'Gender',
            'country_of_citizenship' => 'Country Of Citizenship',
            'first_language' => 'First Language',
            'marital_status' => 'Marital Status',
            'lead_status' => 'Lead Status',
            'referral_source' => 'Referral Source',
            'country_of_interest' => 'Country Of Interest',
            'service_of_interest' => 'Service Of Interest',
            'passport_no' => 'Passport No',
            'passport_expiry_date' => 'Passport Expiry Date',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zip_code' => 'Zip Code',
            'country_of_education' => 'Country Of Education',
            'highest_level_education' => 'Highest Level Education',
            'grading_scheme' => 'Grading Scheme',
            'grade_scale' => 'Grade Scale',
            'grade_average' => 'Grade Average',
            'graduated_recent_school' => 'Graduated Recent School',
            'english_exam_type' => 'English Exam Type',
            'date_of_exam' => 'Date Of Exam',
            'exact_score_listening' => 'Exact Score Listening',
            'exact_score_reading' => 'Exact Score Reading',
            'exact_score_writing' => 'Exact Score Writing',
            'exact_score_speaking' => 'Exact Score Speaking',
            'exact_score_overall' => 'Exact Score Overall',
            'have_gre_exam' => 'Have Gre Exam',
            'gre_exam_date' => 'Gre Exam Date',
            'gre_verbal_score' => 'Gre Verbal Score',
            'gre_verbal_rank' => 'Gre Verbal Rank',
            'gre_quantitative_score' => 'Gre Quantitative Score',
            'gre_quantitative_rank' => 'Gre Quantitative Rank',
            'gre_writing_score' => 'Gre Writing Score',
            'gre_writing_rank' => 'Gre Writing Rank',
            'have_gmat_exam' => 'Have Gmat Exam',
            'gmat_exam_date' => 'Gmat Exam Date',
            'gmat_verbal_score' => 'Gmat Verbal Score',
            'gmat_verbal_rank' => 'Gmat Verbal Rank',
            'gmat_quantitative_score' => 'Gmat Quantitative Score',
            'gmat_quantitative_rank' => 'Gmat Quantitative Rank',
            'gmat_writing_score' => 'Gmat Writing Score',
            'gmat_writing_rank' => 'Gmat Writing Rank',
            'gmat_total_score' => 'Gmat Total Score',
            'gmat_total_rank' => 'Gmat Total Rank',
            'refused_visa' => 'Refused Visa',
            'study_permit' => 'Study Permit',
            'details' => 'Details',
            'upload_document' => 'Upload Passport Size Photo',
            'ten_certificate' => 'Grade 10th Certificate',
            'twelve_certificate' => 'Grade 12th Certificate',
            'passport' => 'Passport',
            'ielts' => 'IELTS/PTE/TOEFL/GRE/GMAT/SAT',
            'graduation_certificate' => 'Bachelor Degree',
            'lor' => 'Letter of Recommendation',
            'moi' => 'Masters  Marksheet',
            'sop' => 'Sop',
            'diploma_certificate' => 'Diploma Certificate',
            'master_certificate' => 'Master Degree',
            'updated_cv' => 'Updated Resume',
            'work_experiance' => 'Work Experience Certificate',
            'other_certificate' => 'Other Certificate',
            'bachelor_marksheet' => 'Bachelor Marksheet',
            'consent' => 'Consent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[StudentSchoolAttended]].
     *
     * @return \yii\db\ActiveQuery
     */
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
    public function getStudentSchoolAttended()
    {
        return $this->hasOne(\common\models\StudentSchoolAttended::className(), ['ID' => 'ID']);
    }
}
