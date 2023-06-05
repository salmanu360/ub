<?php

namespace common\models;

use Yii;
use \common\models\base\Recruiters as BaseRecruiters;
use yii\helpers\ArrayHelper;
use yii\base\Event;
use app\Events\CustomEvent;


/**
 * This is the model class for table "recruiters".
 */
class Recruiters extends BaseRecruiters
{
    const STATUS_RECRUITERS_NEW = 0;
    const STATUS_RECRUITERS_ACTIVE = 1;
    const STATUS_RECRUITERS_INACTIVE = 2;

    const EVENT_RECRUITERS_REGISTER = 'newRegister';
    const EVENT_RECRUITERS_DISAPPROVE = 'newDisapprove';
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
                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                [
                    'email', 'unique',
                    'targetClass' => '\common\models\Recruiters',         
                    'message' => 'This email address has already been taken.'
                ]
            ]
        );
    }

    public static function optionStatus(){
        return [
            self::STATUS_RECRUITERS_NEW => Yii::t('app', 'New'),
            self::STATUS_RECRUITERS_ACTIVE => Yii::t('app', 'Active'),
            self::STATUS_RECRUITERS_INACTIVE => Yii::t('app', 'Inactive') 
        ];
    }

    public function getRecruiterStatus(){

        $labels = self::optionStatus();
        if(isset($labels[$this->status])){
            return $labels[$this->status];
        }
        return $labels[self::STATUS_RECRUITERS_NEW];

    }

    public static function getPassword($length = 8) {
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.'0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';

        return substr(str_shuffle($chars),0,$length);
    }	
}

Event::on(Recruiters::className(), Recruiters::EVENT_RECRUITERS_REGISTER, function ($event){        
    $recruiter = $event->sender;
         $email=$recruiter->email;
           $subject="New";       
                \Yii::$app->mailer->sendEmail($email, $subject, 'register',['model'=>$event->sender]);
           
        }
     
);


Event::on(Recruiters::className(), Recruiters::EVENT_RECRUITERS_DISAPPROVE, function ($event){        
    $recruiter = $event->sender;
      //    $email=$recruiter->email;
          //  $subject="New";       
               // \Yii::$app->mailer->sendEmail($email, $subject, 'register',['model'=>$event->sender]);
           
        }
     
);