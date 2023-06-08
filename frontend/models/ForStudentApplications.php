<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\ForStudentApplications as BaseForStudentApplications;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "for_student_applications".
 */
class ForStudentApplications extends BaseForStudentApplications
{
    const STATUS_APP_FEE_NOTPAID = 0;
    const STATUS_APP_FEE_PENDING = 1;
    const STATUS_APP_FEE_PAID = 2;
    const STATUS_APP_FEE_CANCELLED = 3;

    const STATUS_VISA_FEE_NOTPAID = 0;
    const STATUS_VISA_FEE_PENDING = 1;
    const STATUS_VISA_FEE_PAID = 2;
    const STATUS_VISA_FEE_CANCELLED = 3;

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
                # custom validation rules
            ]
        );
    }

    public static function optionStatus() {
        return [
            self::STATUS_APP_FEE_NOTPAID => Yii::t('app', 'Not Paid'),
            self::STATUS_APP_FEE_PENDING => Yii::t('app', 'Pending'),
            self::STATUS_APP_FEE_PAID => Yii::t('app', 'Paid'),
            self::STATUS_APP_FEE_CANCELLED => Yii::t('app', 'Cancelled')
        ];
    }

    public function getPaymentStatus() {
        $labels = self::optionStatus();
        if(isset($labels[$this->application_fee_status])){
            return $labels[$this->application_fee_status];
        }
        return $labels[self::STATUS_APP_FEE_NOTPAID];
    }

    public static function optionStatusFee() {
        return [
            self::STATUS_VISA_FEE_NOTPAID => Yii::t('app', 'Not Paid'),
            self::STATUS_VISA_FEE_PENDING => Yii::t('app', 'Pending'),
            self::STATUS_VISA_FEE_PAID => Yii::t('app', 'Paid'),
            self::STATUS_VISA_FEE_CANCELLED => Yii::t('app', 'Cancelled')
        ];
    }

    public function getStatusFee() {
        $labels = self::optionStatusFee();
        if(isset($labels[$this->visa_fee_status])){
            return $labels[$this->visa_fee_status];
        }
        return $labels[self::STATUS_VISA_FEE_NOTPAID];
    }

    public function getAppliedStudentDetails($app_id){
        $application = self::findOne(['id' => $app_id]);
        $student_id = $application->student_id;
        $college_id = $application->college_id;
        $course_id = $application->course_id;

        $student = \frontend\models\ForStudents::findOne(['id' => $student_id]);

        return $student;
    }
}
