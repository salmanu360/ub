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

/**
* This is the class for controller "ApplicationsController".
*/
class ApplicationsController extends \backend\controllers\base\ApplicationsController
{
    public function actionIndex()
    {
        $searchModel  = new StudentApplicationsSearch;
        $dataProvider = $searchModel->search($_GET);
        $studentAppliedModel = new \frontend\models\ForStudentApplications();

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'studentAppliedModel' => $studentAppliedModel,
        ]);
    }

    public function actionSaveFee() {        
        $id = $_POST['ForStudentApplications']['app_id'];
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $student_id = $_POST['ForStudentApplications']['student_id'];
            $course_id = $_POST['ForStudentApplications']['course_id'];
            $application_fee = !empty($_POST['ForStudentApplications']['application_fee']) ? $_POST['ForStudentApplications']['application_fee'] : $model->application_fee;
            $visa_fee = !empty($_POST['ForStudentApplications']['visa_fee']) ? $_POST['ForStudentApplications']['visa_fee'] : $model->visa_fee;
            
            Yii::$app->db->createCommand()
                ->update('for_student_applications', [
                        'application_fee' => $application_fee, 
                        'visa_fee' => $visa_fee
                    ], 
                    "student_id = $student_id and course_id = $course_id")
                ->execute();

            return $this->redirect(Url::previous());
        }
    }
}
