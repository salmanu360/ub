<?php

namespace frontend\modules\student\controllers;

use Yii;
use yii\base\Model;
use common\models\School;
use common\models\Course;
use common\models\Recruiters;
use backend\models\SchoolSearch;
use frontend\models\CourseSearch;
use frontend\models\ForStudentApplications;
use common\models\StudentCollegeApplied;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* This is the class for controller "StudentController".
*/
class ProgramsCollegesController extends Controller
{
    public function behaviors() {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view', 'student-list', 'save-apply'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => true,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
    * Lists all Student models.
    * @return mixed
    */
    public function actionIndex() {        
        $this->layout = 'inner';
        
        $searchModel  = new SchoolSearch;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->pagination->pageSize = 12;

        $searchCourseModel  = new CourseSearch;
        $dataProviderCourse = $searchCourseModel->search($_GET);
        $dataProviderCourse->pagination->pageSize = 12;    
        
        $studentApplicationModel  = new ForStudentApplications;
       
        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataProviderCourse' => $dataProviderCourse,
            'searchModel' => $searchModel,
            'searchCourseModel' => $searchCourseModel,
            'studentApplicationModel' => $studentApplicationModel,
        ]);
    }

    public function actionView($id) {
        $this->layout = 'inner';

         $studentModel  = new StudentCollegeApplied;
       
        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;
      
        
        /*\Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();*/

        return $this->render('view', [
        'model' => $this->findModel($id),
        'StudentCollegeApplied' => $studentModel,
       
        ]);
    }

    public function actionApplyNow() { 
        $applicationModel  = new ForStudentApplications;

        $user_id = Yii::$app->user->identity->id;

        if(Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();

            $applicationModel->setAttribute("student_id", (int)$data['student-id']);
            $applicationModel->setAttribute("college_id", (int)$data['college-id']);
            $applicationModel->setAttribute("course_id", (int)$data['course-id']);

            $count = ForStudentApplications::find()->where(['student_id' => $applicationModel->student_id, 'course_id' => $applicationModel->course_id])->count();

            if ( $count > 0 ) {
                Yii::$app->session->setFlash('error', 'You have been already applied for this College');
            } else {
                if ( $applicationModel->validate() && $applicationModel->save() ) {
                    Yii::$app->session->setFlash('success', 'The student applied for this college succesfully');
                }
            }
            return $this->redirect(['index']);
        }
    }


    public function actionStudentList($q = null) {
        $user_id = Yii::$app->user->identity->id;
        $recruiter = Recruiters::findOne(['user_id' => $user_id]);

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $query = new \yii\db\Query();
        
        $query->select(['ID', 'first_name', 'last_name', 'email_id'])
            ->from('student')
            ->where(['recruiter_id' => $recruiter->id])
            ->andWhere(
                ['or',
                    ['like', 'first_name', $q],
                    ['like', 'last_name', $q],
                    ['like', 'email_id', $q],
                    ['like', 'ID', $q]

                ]
            )
            //->where('first_name LIKE "%' . $q .'%"')
            ->orderBy('first_name');

        $command = $query->createCommand();
        $data = $command->queryAll();
        
        $out = [];
        foreach ($data as $d) {
            $out[] = ['ID' => $d['ID'], 'first_name' => $d['first_name'], 'last_name' => $d['last_name'], 'email_id' => $d['email_id'] ];
        }        
        return $out;
    }

    protected function findModel($id) {
        if (($model = School::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
