<?php
namespace common\models;
use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Event;
use app\Events\CustomEvent;
use common\models\User;
/**
 * This is the model class for table "school".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $slug
 * @property string $ref_no
 * @property string $name
 * @property string|null $campus
 * @property string|null $description
 * @property int $status
 * @property int $dest_country
 * @property string $cont_fname
 * @property string $cont_last_name
 * @property string|null $phone_number
 * @property string $cont_email
 * @property string $cont_title
 * @property string|null $comment
 * @property string|null $min_price
 * @property string|null $max_price
 * @property string|null $avg_price
 * @property int $show_home
 * @property int|null $type
 * @property string|null $intake
 * @property string|null $entry_requirment
 * @property string|null $level_of_education
 * @property string|null $start_date
 * @property string|null $accomodation_fee
 * @property string|null $submission_deadlines
 * @property string|null $average_processing_time
 * @property string|null $cash_deposit
 * @property string|null $los_deposit
 * @property string|null $minimum_deposit
 * @property string|null $visa_fee
 * @property string|null $comission
 * @property string|null $servis_fee
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Course[] $courses
 */
class School extends \yii\db\ActiveRecord
{
    public $agree;
    const STATUS_SCHOOL_NEW=0;
    const STATUS_SCHOOL_ACTIVE=0;
    const STATUS_SCHOOL_INACTIVE=0;
    const EVENT_SCHOOL_REGISTER = 'newRegister';
    const EVENT_SCHOOL_DISAPPROVE = 'newDisapprove';
    public static function tableName()
    {
        return 'school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dest_country', 'cont_fname', 'cont_last_name', 'cont_title'], 'required'],
            [['user_id', 'status', 'dest_country', 'show_home', 'type'], 'integer'],
            [['description', 'comment'], 'string'],
            [['start_date', 'created_at', 'updated_at'], 'safe'],
            [['slug'], 'string', 'max' => 200],
            [['ref_no'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 220],
            [['campus', 'intake', 'entry_requirment', 'level_of_education', 'accomodation_fee', 'submission_deadlines', 'average_processing_time', 'cash_deposit', 'los_deposit', 'minimum_deposit', 'visa_fee', 'servis_fee','comission'], 'string', 'max' => 255],
            [['cont_fname', 'cont_last_name'], 'string', 'max' => 120],
            [['phone_number'], 'string', 'max' => 15],
            [['cont_email'], 'string', 'max' => 60],
            [['cont_email'], 'unique', 'message' => 'This Email is already in use'],
            [['cont_title'], 'string', 'max' => 240],
            [['min_price', 'max_price', 'avg_price'], 'string', 'max' => 25],
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
            'slug' => 'Slug',
            'ref_no' => 'Ref No',
            'name' => 'Name',
            'campus' => 'Campus',
            'description' => 'Description',
            'status' => 'Status',
            'dest_country' => 'Dest Country',
            'cont_fname' => 'Cont Fname',
            'cont_last_name' => 'Cont Last Name',
            'phone_number' => 'Phone Number',
            'cont_email' => 'Cont Email',
            'cont_title' => 'Cont Title',
            'comment' => 'Comment',
            'min_price' => 'Min Price',
            'max_price' => 'Max Price',
            'avg_price' => 'Avg Price',
            'show_home' => 'Show Home',
            'type' => 'Type',
            'intake' => 'Intake',
            'entry_requirment' => 'Entry Requirment',
            'level_of_education' => 'Level Of Education',
            'start_date' => 'Start Date',
            'accomodation_fee' => 'Accomodation Fee',
            'submission_deadlines' => 'Submission Deadlines',
            'average_processing_time' => 'Average Processing Time',
            'cash_deposit' => 'Cash Deposit',
            'los_deposit' => 'Los Deposit',
            'minimum_deposit' => 'Minimum Deposit',
            'visa_fee' => 'Visa Fee',
            'servis_fee' => 'Servis Fee',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['college_id' => 'id']);
    }

    public function getRefrenceNo(){
        $refno = date("Ymdhis").rand(0,9);
        return Yii::$app->params['school_ref'].$refno;
    
    }
}

Event::on(School::className(), School::EVENT_SCHOOL_REGISTER, function ($event){        
    $recruiter = $event->sender;
      //    $email=$recruiter->email;
          //  $subject="New";       
               // \Yii::$app->mailer->sendEmail($email, $subject, 'register',['model'=>$event->sender]);
           
        }
     
);


Event::on(School::className(), School::EVENT_SCHOOL_DISAPPROVE, function ($event){        
    $recruiter = $event->sender;
      //    $email=$recruiter->email;
          //  $subject="New";       
               // \Yii::$app->mailer->sendEmail($email, $subject, 'register',['model'=>$event->sender]);
           
        }
     
);
