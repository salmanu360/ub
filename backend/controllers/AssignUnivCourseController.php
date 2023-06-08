<?php

namespace backend\controllers;
use Yii;
use common\models\AssignUnivCourse;
use common\models\Student;
use common\models\AssignUnivCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssignUnivCourseController implements the CRUD actions for AssignUnivCourse model.
 */
class AssignUnivCourseController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AssignUnivCourse models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AssignUnivCourseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionStudentlistapplication()
    {
        
        if(isset($_POST['unique_id'])){
            $unique_id=$_POST['unique_id'];
            $email=$_POST['email'];
            $name=$_POST['name'];

            if(!empty($unique_id)){
                $student_query =\common\models\Student::find()->where(['ID'=>$unique_id])->all();
            }else if(!empty($email)){
                $student_query =\common\models\Student::find()->where(['email_id'=>$email])->all();
            }else if(!empty($name)){
                $student_query =\common\models\Student::find()->where(['first_name'=>$name])->all();
            }

        }else{
            
                if(isset($_GET['id'])){
                    
                    $student_query =\common\models\Student::find()->where(['lead_status'=>$_GET['id'],'assign_application_team'=>Yii::$app->user->id])->all();
                    
                }else{
                    $student_query =\common\models\Student::find()->where(['assign_application_team'=>Yii::$app->user->id])->all();
                }
        }
        
        return $this->render('student_list', [
            'student_query' => $student_query,
        ]);
    }
    
   public function actionStudentlist()
    {
        
        if(isset($_POST['unique_id'])){
            $unique_id=$_POST['unique_id'];
            $email=$_POST['email'];
            $name=$_POST['name'];

            if(!empty($unique_id)){
                $student_query =\common\models\Student::find()->where(['ID'=>$unique_id])->all();
            }else if(!empty($email)){
                $student_query =\common\models\Student::find()->where(['email_id'=>$email])->all();
            }else if(!empty($name)){
                $student_query =\common\models\Student::find()->where(['first_name'=>$name])->all();
            }

        }else{
            
                if(isset($_GET['id'])){
                    $student_query =\common\models\Student::find()->where(['lead_status'=>$_GET['id']])->all();
                    
                }else{
                    $student_query =\common\models\Student::find()->all();
                }
        }
        
        return $this->render('student_list', [
            'student_query' => $student_query,
        ]);
    }

    public function actionViewstudentlist($id)
    {
        $model2=new \common\models\StudentPendingDocument;
        // $model=AssignUnivCourse::findOne($id);
        $student=\common\models\Student::find()->where(['ID'=>$id])->one();
        $AssignUnivCourse=AssignUnivCourse::find()->where(['student_id'=>$id])->all();
        if ($this->request->isPost) {
            $recruiter_id=$_POST['recruiter_id'];
            $rm_id=$_POST['rm_id'];
            $student_id=$_POST['student_id'];
            $comment=$_POST['comment'];
            $pending_document=$_POST['pending_document'];
            $model2->lead_status=$_POST['lead_status'];
            $model2->pending_document=$_POST['pending_document'];
            $model2->comment=$_POST['comment'];
            $model2->student_id=$id;
            $model2->created_by=Yii::$app->user->id;
            $model2->save(false);
            $student=Student::find()->where(['ID'=>$id])->one();
            $student->lead_status=$_POST['lead_status'];
            $student->save(false);
            $this->redirect(['studentlist']); 
        }

        return $this->render('student_list_view', [
            'model2' => $model2,
            // 'model' => $model,
            'student_id' => $id,
            'student' => $student,
            'AssignUnivCourse' => $AssignUnivCourse,
            ]);
    }

    /**
     * Displays a single AssignUnivCourse model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AssignUnivCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AssignUnivCourse();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssignUnivCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssignUnivCourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssignUnivCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AssignUnivCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssignUnivCourse::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
