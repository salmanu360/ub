<?php

namespace frontend\modules\recruiter\controllers;

use Yii;
use yii\base\Model;
use common\models\School;
use common\models\Course;
use common\models\Recruiters;
use backend\models\SchoolSearch;
use frontend\models\CourseSearch;
use common\models\StudentCollegeApplied;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use yii\data\ActiveDataProvider;
/**
* This is the class for controller "StudentController".
*/
class ProgramsCollegesController extends Controller
{
      public $enableCsrfValidation = false;
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
                'only' => ['index', 'view', 'student-list', 'save-apply','coursesearch','courseview'],
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
    
    public function actionCourseview($id)
    {
         $this->layout = 'inner';
         $model=Course::findOne($id);
         return $this->render('course_view',['model'=>$model]);
    }
    
    public function actionGetstate(){
      $id=Yii::$app->request->post('id');
      $group=\common\models\State::find()->where(['country_id'=>$id])->all();
      $options = "<option selected='selected'>Select</option>";
      foreach($group as $group)
      {
        $options .= "<option value='".$group->id."'>".$group->name."</option>";
      }
      return $options;
    }
    public function actionCoursesearch(){
        $this->layout = 'inner';
        $model=new \common\models\CourseSearchs();
        if(Yii::$app->request->post()){
            $data=Yii::$app->request->post('CourseSearchs');

            $course=$data['course'];
            $school=$data['school'];
            $country=$data['country'];
            $year=$data['year'];
            //$program_level=$data['program_level'];

            if($course =='' && $school == '' && $country == '' && $year ==''){
                $query=Course::find()->where(['application_fee'=>'2.3256.256.3256.'])->all();
            }

            else if($school == '' && $country == '' && $year ==''){
                $query=Course::find()->where(['name'=>$course])->all();
               
            }else if($course == '' && $country == '' && $year ==''){
                $query=Course::find()->where(['college_id'=>$school])->all();
                
            }else if($country == '' && $year ==''){
                $query=Course::find()->where(['name'=>$course,'college_id'=>$school])->all();

            }else if($school == '' && $course == '' && $year ==''){ //country search
                $college=School::find()->where(['dest_country'=>$country])->all();
                $collegeID=[];
                foreach($college as $collegeId){
                     $collegeID[]=$collegeId->id;

                }
                $query=Course::find()->where(['college_id'=>$collegeID])->all();
                // echo '<pre>';print_r($collegeID);die;

            }else if($school == '' && $year ==''){ //country search
                $college=School::find()->where(['dest_country'=>$country])->all();
                $collegeID=[];
                foreach($college as $collegeId){
                     $collegeID[]=$collegeId->id;

                }
                $query=Course::find()->where(['name'=>$course,'college_id'=>$collegeID])->all();

            }else if(!empty($course) && !empty($school) && !empty($school) && $year =='' ){
                $college=School::find()->where(['dest_country'=>$country])->all();
                $collegeID=[];
                foreach($college as $collegeId){
                     $collegeID[]=$collegeId->id;

                }
                $query=Course::find()->where(['name'=>$course,'college_id'=>$collegeID])->all();
            }else  if($course =='' && $school == '' && $country == ''){
                $query=Course::find()->where(['year'=>$year])->all();
            }else  if($school == '' && $country == ''){
                $query=Course::find()->where(['name'=>$course,'year'=>$year])->all();
            }else  if($country == ''){
                $query=Course::find()->where(['name'=>$course,'college_id'=>$school,'year'=>$year])->all();
            }
            else  if($course == '' && $year == ''){
                $college=School::find()->where(['dest_country'=>$country])->all();
                $collegeID=[];
                foreach($college as $collegeId){
                     $collegeID[]=$collegeId->id;

                }
                $query=Course::find()->where(['college_id'=>$school])->all();
            }else{
                $college=School::find()->where(['dest_country'=>$country])->all();
                $collegeID=[];
                foreach($college as $collegeId){
                     $collegeID[]=$collegeId->id;

                }
               $query=Course::find()->where(['name'=>$course,'college_id'=>$collegeID,'year'=>$year])->all();
            }
            return $this->render('course_search',['model'=>$model,'query'=>$query]);

            // echo "<pre>";print_r($_POST);die;
        }
        return $this->render('course_search',['model'=>$model]);
    }
    public function actionIndex() {   
        //echo date('Y-m-d',strtotime('1645554939'));die;     
        $this->layout = 'inner';
        $searchModel  = new SchoolSearch;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->pagination->pageSize = 12;

        $searchCourseModel  = new CourseSearch;
        $dataProviderCourse = $searchCourseModel->search($_GET);
        $dataProviderCourse->pagination->pageSize = 12;
        

        /* new code */
        if(isset($_GET['CourseSearch'])){
            //  echo '<pre>';print_r($_GET);die;
            $data=$_GET['CourseSearch'];
            $name=$data['name'];
            //$intake=$data['intake'];
            // $year=$data['year'];
            $searchCourseModelFilter  = new CourseSearch;
            $query = Course::find();
            $query->joinWith(['school']);
            $query->Where(['course.id'=>$name])
            ->andWhere(['course.created_at'=>'1645554937']);
            $dataProvidercoursefilter = new ActiveDataProvider([
                'query' => $query,
            ]);
        }else{
            $searchCourseModelFilter  = new CourseSearch;
            $query = Course::find();
            $query->joinWith(['school']);
            // $query->andFilterWhere(['like', 'course.id', $data['status']]);
            $dataProvidercoursefilter = new ActiveDataProvider([
                'query' => $query,
            ]);
        }
        
         $dataProvidercoursefilter->pagination->pageSize = 12;
        /* new code end*/
        
         
        

        $studentModel  = new StudentCollegeApplied;
        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataProviderCourse' => $dataProviderCourse,
            'searchModel' => $searchModel,
            'searchCourseModel' => $searchCourseModel,
            'dataProvidercoursefilter' => $dataProvidercoursefilter,
            'searchCourseModelFilter' => $searchCourseModelFilter,
            'StudentCollegeApplied' => $studentModel,
        ]);
    }

    public function actionIndex2() {  
        $this->layout = 'inner';
        $searchModel  = new SchoolSearch;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->pagination->pageSize = 12;

        $searchCourseModel  = new CourseSearch;
        $dataProviderCourse = $searchCourseModel->search($_GET);
        $dataProviderCourse->pagination->pageSize = 12;
        $data=$_POST['CourseSearch'];
        $course_id=$data['status'];
        //$query = Course::find()->where(['id'=>$course_id])->one();

        $query = Course::find();
        $query->joinWith(['school']);
        $query->andFilterWhere(['like', 'course.id', $data['status']]);
        $dataProvidercoursefilter = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvidercoursefilter->pagination->pageSize = 12;

        $studentModel  = new StudentCollegeApplied;
        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataProviderCourse' => $dataProviderCourse,
            'searchModel' => $searchModel,
            'searchCourseModel' => $searchCourseModel,
            'dataProvidercoursefilter' => $dataProvidercoursefilter,
           // 'searchCourseModelFilter' => $searchCourseModelFilter,
            'StudentCollegeApplied' => $studentModel,
        ]);
        // echo '<pre>';print_r($query);die;
        
        // $query->joinWith(['school']);


    }
    public function actionIndex1() {        
        $this->layout = 'inner';
        
        $searchModel  = new SchoolSearch;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->pagination->pageSize = 12;

        $searchCourseModel  = new CourseSearch;
        $dataProviderCourse = $searchCourseModel->search($_GET);
        $dataProvidercoursefilter = $searchCourseModel->search($_GET);
        $dataProviderCourse->pagination->pageSize = 12;    


        $searchCourseModelFilter  = new CourseSearch;
        $dataProviderCourse = $searchCourseModelFilter->search($_GET);
        $dataProvidercoursefilter = $searchCourseModelFilter->search($_GET);
        $dataProviderCourse->pagination->pageSize = 12; 
        
        $studentModel  = new StudentCollegeApplied;
       
        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;


        /* new search filter code */
        /* if(Yii::$app->request->post()){
            $data=Yii::$app->request->post('CourseSearch');
            $query = Course::find();
            $query->joinWith(['school']);
            $query->andFilterWhere(['like', 'course.id', $data['status']]);
            $dataProvidercoursefilter = new ActiveDataProvider([
                'query' => $query,
            ]);
            $dataProvidercoursefilter->pagination->pageSize = 12; 
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'dataProvidercoursefilter' => $dataProvidercoursefilter,
                'dataProviderCourse' => $dataProviderCourse,
                'searchModel' => $searchModel,
                'searchCourseModel' => $searchCourseModel,
                'searchCourseModel1' => $searchCourseModel1,
                'StudentCollegeApplied' => $studentModel,
            ]);
        } */
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'dataProviderCourse' => $dataProviderCourse,
                'searchModel' => $searchModel,
                'searchCourseModel' => $searchCourseModel,
                'searchCourseModelFilter' => $searchCourseModelFilter,
                'StudentCollegeApplied' => $studentModel,
            ]);
        
        /* new search filter code end */

        
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

    public function actionSaveApply() { 
        $studentModel  = new StudentCollegeApplied;

        $user_id = Yii::$app->user->identity->id;
        $recruiter = Recruiters::findOne(['user_id' => $user_id]);


        if(Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('StudentCollegeApplied');

            //$studentModel->student_id   = (int)$data['student_id'];
            $studentModel->setAttribute("student_id", (int)$data['student_id']);
            $studentModel->setAttribute("college_id", (int)$data['college_id']);
            $studentModel->setAttribute("course_id", (int)$data['course_id']);
            $studentModel->setAttribute("recruiter_id", (int)$recruiter->id);
            
           /* echo "<pre>";
            var_dump( $studentModel ); 
            die(); */

            $count = StudentCollegeApplied::find()->where(['student_id' => $studentModel->student_id, 'college_id' => $studentModel->college_id])->count();

            if ( $count > 0 ) {
                Yii::$app->session->setFlash('error', 'This student has been already applied for this school');
            } else {
                if ( $studentModel->validate() && $studentModel->save() ) {
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
