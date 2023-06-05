<?php

namespace common\models;

use Yii;
use \common\models\base\PaymentHistory as BasePaymentHistory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "payment_history".
 */
class PaymentHistory extends BasePaymentHistory
{

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

    /* public static function getCommision(){
        $recruiter_id = Yii::$app->user->identity->recruiter->id;
        if(empty($recruiter_id)){
            return null;
        }

        $payemnts = \common\models\PaymentHistory::find()->where(['recruiter_id' => $recruiter_id])->all();
        $app_count = count($payemnts);

        $amount = [];
        foreach($payemnts as $payemnt){
            $amount[] = (int)$payemnt->amount;            
        }
        
        if($app_count > 0 && $app_count <= 10){
            $commission = (array_sum($amount) * 60) / 100 ; 
        } elseif($app_count > 10 && $app_count <= 20){
            $commission = (array_sum($amount) * 70) / 100 ;
        } elseif($app_count > 20 && $app_count <= 30){
            $commission = (array_sum($amount) * 80) / 100 ;
        }

        return $commission;
    } */

    public static function getCommision(){
        $recruiter_id = Yii::$app->user->identity->recruiter->id;
        if(empty($recruiter_id)){
            return null;
        }

        $payemnts = \common\models\StudentCollegeApplied::find()->where([
            'recruiter_id' => $recruiter_id,
            'application_fee_status' => StudentCollegeApplied::STATUS_APP_FEE_PAID,
            'visa_fee_status' => StudentCollegeApplied::STATUS_VISA_FEE_PAID,
        ])->all();
        $app_count = count($payemnts);
        
        $amount = [];
        foreach($payemnts as $payemnt){
            $amount[] = (int)$payemnt->commission_amount;            
        }
        
        if($app_count > 0 && $app_count <= 10){
            $commission = (array_sum($amount) * 60) / 100 ; 
        } elseif($app_count > 10 && $app_count <= 20){
            $commission = (array_sum($amount) * 70) / 100 ;
        } elseif($app_count > 20 && $app_count <= 30){
            $commission = (array_sum($amount) * 80) / 100 ;
        }else{
            $commission =0;
        }
        
        return $commission;
    }
}
