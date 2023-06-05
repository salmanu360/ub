<?php

namespace frontend\modules\student\controllers\api;

/**
* This is the class for REST controller "PaymentsController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PaymentsController extends \yii\rest\ActiveController
{
public $modelClass = 'frontend\models\ForPaymentHistory';
}
