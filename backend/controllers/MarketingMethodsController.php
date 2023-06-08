<?php

namespace backend\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use common\models\User;
/**
* This is the class for controller "MarketingMethodsController".
*/
class MarketingMethodsController extends \backend\controllers\base\MarketingMethodsController
{

    
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),  
                'rules' => [
                    [
                     //   'class' => \app\filters\AccessRule::className(),
                        'allow' => true,
                        'actions' => ['index', 'view', 'update', 'delete','create'],
                       // 'roles' => [User::TYPE_ADMIN],
                    ], 
                   
                  
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }

}
