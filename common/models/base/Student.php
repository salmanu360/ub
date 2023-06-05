<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "student".
 *
 * @property integer $ID
 * @property integer $recruiter_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birth_date
 * @property string $email_id
 * @property string $phone_no
 * @property string $gender
 * @property integer $country_of_citizenship
 * @property string $first_language
 * @property string $marital_status
 * @property string $lead_status
 * @property string $referral_source
 * @property string $country_of_interest
 * @property string $service_of_interest
 * @property string $passport_no
 * @property string $passport_expiry_date
 * @property string $address
 * @property string $city
 * @property string $state
 * @property integer $country
 * @property string $zip_code
 * @property integer $country_of_education
 * @property string $highest_level_education
 * @property string $grading_scheme
 * @property integer $grade_scale
 * @property string $grade_average
 * @property integer $graduated_recent_school
 * @property string $english_exam_type
 * @property string $date_of_exam
 * @property integer $exact_score_listening
 * @property integer $exact_score_reading
 * @property integer $exact_score_writing
 * @property integer $exact_score_speaking
 * @property integer $exact_score_overall
 * @property integer $have_gre_exam
 * @property string $gre_exam_date
 * @property integer $gre_verbal_score
 * @property integer $gre_verbal_rank
 * @property integer $gre_quantitative_score
 * @property integer $gre_quantitative_rank
 * @property integer $gre_writing_score
 * @property integer $gre_writing_rank
 * @property integer $have_gmat_exam
 * @property string $gmat_exam_date
 * @property integer $gmat_verbal_score
 * @property integer $gmat_verbal_rank
 * @property integer $gmat_quantitative_score
 * @property integer $gmat_quantitative_rank
 * @property integer $gmat_writing_score
 * @property integer $gmat_writing_rank
 * @property integer $gmat_total_score
 * @property integer $gmat_total_rank
 * @property integer $refused_visa
 * @property string $study_permit
 * @property string $details
 * @property string $upload_document
 * @property string $ten_certificate
 * @property integer $consent
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \common\models\StudentSchoolAttended $studentSchoolAttended
 * @property string $aliasModel
 */
abstract class Student extends \yii\db\ActiveRecord
{

    public $status;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recruiter_id', 'first_name', 'birth_date', 'email_id', 'phone_no', 'gender', 'country_of_citizenship', 'first_language', 'marital_status', 'passport_no', 'address', 'city', 'country', 'zip_code', 'country_of_education', 'highest_level_education', 'grading_scheme', 'grade_scale', 'grade_average', 'refused_visa', 'consent'], 'required'],
            [['recruiter_id', 'country_of_citizenship', 'country', 'country_of_education', 'grade_scale', 'graduated_recent_school', 'have_gre_exam', 'gre_verbal_score', 'gre_verbal_rank', 'gre_quantitative_score', 'gre_quantitative_rank', 'gre_writing_score', 'gre_writing_rank', 'have_gmat_exam', 'gmat_verbal_score', 'gmat_verbal_rank', 'gmat_quantitative_score', 'gmat_quantitative_rank', 'gmat_writing_score', 'gmat_writing_rank', 'gmat_total_score', 'gmat_total_rank', 'refused_visa', 'consent'], 'integer'],
            [['birth_date', 'passport_expiry_date', 'date_of_exam', 'gre_exam_date', 'gmat_exam_date', 'exact_score_listening', 'exact_score_reading', 'exact_score_writing', 'exact_score_speaking', 'exact_score_overall'], 'safe'],
            [['address', 'details'], 'string'],
            [['first_name', 'middle_name', 'last_name', 'phone_no', 'passport_no'], 'string', 'max' => 20],
            [['email_id'], 'string', 'max' => 65],
            [['gender', 'zip_code'], 'string', 'max' => 10],
            [['first_language'], 'string', 'max' => 30],
            [['status'], 'safe'],
            [['marital_status', 'lead_status', 'referral_source', 'country_of_interest', 'service_of_interest', 'city', 'state', 'highest_level_education', 'grading_scheme', 'grade_average', 'english_exam_type', 'study_permit', 'upload_document','ten_certificate','twelve_certificate','passport','ielts','graduation_certificate','lor','moi','sop','diploma_certificate','master_certificate','updated_cv','work_experiance','other_certificate','bachelor_marksheet'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'recruiter_id' => 'Recruiter ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'birth_date' => 'Birth Date',
            'email_id' => 'Email ID',
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
            'upload_document' => 'Upload Document',
            'consent' => 'Consent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSchoolAttended()
    {
        return $this->hasOne(\common\models\StudentSchoolAttended::className(), ['ID' => 'ID']);
    }




}
