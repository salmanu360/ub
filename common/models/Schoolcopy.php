<?php

namespace common\models;

use Yii;
use \common\models\base\School as BaseSchool;
use yii\helpers\ArrayHelper;
use yii\base\Event;
use app\Events\CustomEvent;
use common\models\User;
/**
 * This is the model class for table "school".
 */
class School extends BaseSchool
{

    public $agree;

    const STATUS_SCHOOL_NEW=0;
    const STATUS_SCHOOL_ACTIVE=0;
    const STATUS_SCHOOL_INACTIVE=0;
    const EVENT_SCHOOL_REGISTER = 'newRegister';
    const EVENT_SCHOOL_DISAPPROVE = 'newDisapprove';


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
        return ArrayHelper::merge(
            parent::rules(),
            [
                [
                    'agree', 'required',
                    'requiredValue' => 1,
                    'message' => 'please accept term & condition'
                ],

              /*  [['cont_email'], 'unique',
                 'targetClass' => '\common\models\User', 
                 'targetAttribute' => 'email', 
                'message'=>'This Email is already in use'],
            ], */
            [['cont_email'], 'unique',
                 'message'=>'This Email is already in use'],
                 ],
        );
    }


        

    public function attributeLabels()
    {
        return [
                    'id' => 'ID',
                    'user_id' => 'User ID',
                    'ref_no' => 'Ref No',
                    'status' => 'Status',
                    'dest_country' => 'Destination Country',
                    'cont_fname' => 'Contact First name',
                    'cont_last_name' => 'Contact Last Name',
                    'phone_number' => 'Phone Number',
                    'cont_email' => 'Contact Email',
                    'cont_title' => 'Contact Title',
                    'comment' => 'Comment',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'name' => 'Name',
                ];
           
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