<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "for_students".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_date
 * @property string|null $phone_no
 * @property string $gender
 * @property int $country_of_citizenship
 * @property string $first_language
 * @property string $marital_status
 * @property string|null $country_of_interest
 * @property string|null $service_of_interest
 * @property string $passport_no
 * @property string|null $passport_expiry_date
 * @property string $address
 * @property string $city
 * @property string|null $state
 * @property int $country
 * @property string $zip_code
 * @property int $country_of_education
 * @property string $highest_level_education
 * @property string $grading_scheme
 * @property int|null $grade_scale
 * @property string|null $grade_average
 * @property int|null $graduated_recent_school
 * @property string|null $english_exam_type
 * @property string|null $date_of_exam
 * @property int|null $exact_score_listening
 * @property int|null $exact_score_reading
 * @property int|null $exact_score_writing
 * @property int|null $exact_score_speaking
 * @property int|null $exact_score_overall
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
 * @property string $details
 * @property string|null $upload_document
 * @property int $consent
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class ForStudents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'for_students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'birth_date', 'gender', 'country_of_citizenship', 'first_language', 'marital_status', 'passport_no', 'address', 'city', 'country', 'zip_code', 'country_of_education', 'highest_level_education', 'grading_scheme', 'refused_visa', 'details', 'consent'], 'required'],
            [['user_id', 'country_of_citizenship', 'country', 'country_of_education', 'grade_scale', 'graduated_recent_school', 'exact_score_listening', 'exact_score_reading', 'exact_score_writing', 'exact_score_speaking', 'exact_score_overall', 'have_gre_exam', 'gre_verbal_score', 'gre_verbal_rank', 'gre_quantitative_score', 'gre_quantitative_rank', 'gre_writing_score', 'gre_writing_rank', 'have_gmat_exam', 'gmat_verbal_score', 'gmat_verbal_rank', 'gmat_quantitative_score', 'gmat_quantitative_rank', 'gmat_writing_score', 'gmat_writing_rank', 'gmat_total_score', 'gmat_total_rank', 'refused_visa', 'consent', 'created_at', 'updated_at'], 'integer'],
            [['birth_date', 'passport_expiry_date', 'date_of_exam', 'gre_exam_date', 'gmat_exam_date'], 'safe'],
            [['address', 'details'], 'string'],
            [['first_name', 'last_name', 'first_language', 'marital_status'], 'string', 'max' => 30],
            [['phone_no'], 'string', 'max' => 15],
            [['gender', 'zip_code'], 'string', 'max' => 10],
            [['country_of_interest', 'service_of_interest', 'city', 'state', 'highest_level_education', 'study_permit'], 'string', 'max' => 200],
            [['passport_no'], 'string', 'max' => 20],
            [['grading_scheme', 'grade_average', 'english_exam_type', 'upload_document'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birth_date' => 'Birth Date',
            'phone_no' => 'Phone No',
            'gender' => 'Gender',
            'country_of_citizenship' => 'Country Of Citizenship',
            'first_language' => 'First Language',
            'marital_status' => 'Marital Status',
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
}
