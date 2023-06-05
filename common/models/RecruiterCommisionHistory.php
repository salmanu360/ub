<?php

namespace common\models;

use Yii;
use \common\models\base\RecruiterCommisionHistory as BaseRecruiterCommisionHistory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "recruiter_commision_history".
 */
class RecruiterCommisionHistory extends BaseRecruiterCommisionHistory
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

    public static function calculateCommision($id){

        $payemnts = \common\models\StudentCollegeApplied::find()->where([
            'recruiter_id' => $id,
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
        }
        
        return $commission;
    }
}
