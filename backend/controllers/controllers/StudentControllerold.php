<?php

namespace backend\controllers;

use Yii;
use frontend\models\ForStudentApplications;
use backend\models\StudentApplicationsSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use yii\data\ActiveDataProvider;

/**
* This is the class for controller "StudentController".
*/
class StudentController extends \backend\controllers\base\StudentController
{
    public function actionApplications($id)
    {
        $model = $this->findModel($id);
        $studentAppliedModel = new \frontend\models\ForStudentApplications();

        $query = ForStudentApplications::find()->where(['student_id' => $id]);       
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('applications', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'studentAppliedModel' => $studentAppliedModel,
        ]);       
    }
}
