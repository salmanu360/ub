<?php

namespace frontend\modules\recruiter\controllers\api;

/**
* This is the class for REST controller "PaymentHistoryController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PaymentHistoryController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\PaymentHistory';
}
