<?php

namespace common\models;

use Yii;
use \common\models\base\StudentCollegeApplied as BaseStudentCollegeApplied;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "student_school_applied".
 */
class StudentCollegeApplied extends BaseStudentCollegeApplied
{
    const STATUS_APP_FEE_NOTPAID = 0;
    const STATUS_APP_FEE_PENDING = 1;
    const STATUS_APP_FEE_PAID = 2;
    const STATUS_APP_FEE_CANCELLED = 3;

    const STATUS_VISA_FEE_NOTPAID = 0;
    const STATUS_VISA_FEE_PENDING = 1;
    const STATUS_VISA_FEE_PAID = 2;
    const STATUS_VISA_FEE_CANCELLED = 3;

    const STATUS_RECRUITER_PAY_NEW = 0;
    const STATUS_RECRUITER_PAY_PROCESSING = 1;
    const STATUS_RECRUITER_PAY_DONE = 2;
    const STATUS_RECRUITER_PAY_CANCELLED = 3;

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

    public static function optionRecruiterPayment() {
        return [
            self::STATUS_RECRUITER_PAY_NEW => Yii::t('app', 'New'),
            self::STATUS_RECRUITER_PAY_PROCESSING => Yii::t('app', 'Processing'),
            self::STATUS_RECRUITER_PAY_DONE => Yii::t('app', 'Done'),
            self::STATUS_RECRUITER_PAY_CANCELLED => Yii::t('app', 'Cancelled')
        ];
    }

    public function getStatusRecruiterPayment() {
        $labels = self::optionRecruiterPayment();
        if(isset($labels[$this->pay_status])){
            return $labels[$this->pay_status];
        }
        return $labels[self::STATUS_RECRUITER_PAY_NEW];
    }
     
    public function getCourseTotalAmount($app_id){
        $application = self::findOne(['id' => $app_id]);
        $studen_id = $application->student_id; 
        $college_id = $application->college_id; 
        $course_id = $application->course_id;

        $course = \common\models\Course::findOne(['id' => $course_id]);

        echo "<pre>";
        var_dump($course->tution_fee);
        die();
    }

    public function getAppliedStudentDetails($app_id){
        $application = self::findOne(['id' => $app_id]);
        $student_id = $application->student_id;
        $college_id = $application->college_id;
        $course_id = $application->course_id;

        $student = \common\models\Student::findOne(['ID' => $student_id]);

        return $student;
    }
}