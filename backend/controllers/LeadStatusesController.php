<?php

namespace backend\controllers;
use Yii;
use common\models\LeadStatuses;
use common\models\LeadStatusesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * LeadStatusesController implements the CRUD actions for LeadStatuses model.
 */
class LeadStatusesController extends Controller
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
     * Lists all LeadStatuses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LeadStatusesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    

    public function actionLeadtimeline(){
        $model=new LeadStatuses();
       
        
        if(Yii::$app->request->post('LeadStatuses')){
            $data=Yii::$app->request->post('LeadStatuses');
            $recruiter_id=$data['recruiter_id'];
            $student_id=$data['student_id'];
            // $status=$data['status'];
            if(!empty($recruiter_id) and !empty($student_id)){
            $query= \common\models\Student::find()
            ->select(['student.ID studentId','student.first_name','student.last_name','student.email_id','student.recruiter_id','student.lead_status','leadhistory.id','leadhistory.name'])
            ->innerJoin('lead_history leadhistory','leadhistory.student_id=student.ID')
            ->where(['student.recruiter_id'=> $recruiter_id,'student.ID'=>$student_id])
            ->groupBy(['student.ID','leadhistory.student_id']);
            }
            /* else if(!empty($recruiter_id) and !empty($student_id) and !empty($status)){
                $query= \common\models\Student::find()
                ->select(['student.ID studentId','student.first_name','student.last_name','student.email_id','student.recruiter_id','student.lead_status','leadhistory.id','leadhistory.name'])
                ->innerJoin('lead_history leadhistory','leadhistory.student_id=student.ID')
                ->where(['student.recruiter_id'=> $recruiter_id,'student.ID'=>$student_id,'student.lead_status'=>$status])
                ->groupBy(['student.ID','leadhistory.student_id']);
            } */
            else{
                // echo "else";die;
                $query= \common\models\Student::find()
                ->select(['student.ID studentId','student.first_name','student.last_name','student.email_id','student.recruiter_id','student.lead_status','leadhistory.id','leadhistory.name'])
                ->innerJoin('lead_history leadhistory','leadhistory.student_id=student.ID')
                ->where(['student.recruiter_id'=> ($recruiter_id)?$recruiter_id:null])
                ->orwhere(['student.ID'=>($student_id)?$student_id:null])
                // ->orwhere(['student.lead_status'=>($status)?$status:null])
                ->groupBy(['student.ID','leadhistory.student_id']);
            }
            
        }else{
            $query= \common\models\Student::find()
            ->select(['student.ID studentId','student.first_name','student.last_name','student.email_id','student.recruiter_id','student.lead_status','leadhistory.id','leadhistory.name'])
            ->innerJoin('lead_history leadhistory','leadhistory.student_id=student.ID')
            ->groupBy(['student.ID','leadhistory.student_id']);
        }

        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => 8,
        ]);
        $students = $query->offset($pages->offset)->limit($pages->limit)->orderBy(['student.ID'=>SORT_DESC])->asArray()->all(); 

        return $this->render('lead_timeline',['students'=>$students,'pages' => $pages,'model'=>$model]);
    }
    
    public function actionLeadstudent(){
        $model=new LeadStatuses();
        $leadStatus=LeadStatuses::find()->all();
        if(Yii::$app->request->post('LeadStatuses')){
            $data=Yii::$app->request->post('LeadStatuses');
            $recruiter_id=$data['recruiter_id'];
            $student_id=$data['student_id'];
            $status=$data['status'];
            $query = \common\models\Student::find();
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            if(!empty($recruiter_id) and !empty($student_id)){
                $students = $query->offset($pages->offset)->limit('10')
                ->where(['recruiter_id'=> $recruiter_id,'ID'=>$student_id])->orderBy(['ID'=>SORT_DESC])->all();
            }else if(!empty($recruiter_id) and !empty($student_id) and !empty($status)){
                $students = $query->offset($pages->offset)->limit('10')
                ->where(['recruiter_id'=> $recruiter_id,'ID'=>$student_id,'lead_status'=>$status])->orderBy(['ID'=>SORT_DESC])->all();
            }else if(!empty($recruiter_id) and !empty($status)){
                $students = $query->offset($pages->offset)->limit('10')
                ->where(['recruiter_id'=> $recruiter_id,'lead_status'=>$status])->orderBy(['ID'=>SORT_DESC])->all();
            }else if(!empty($student_id) and !empty($status)){
                $students = $query->offset($pages->offset)->limit('10')
                ->where(['ID'=> $student_id,'lead_status'=>$status])->orderBy(['ID'=>SORT_DESC])->all();
            }else{
                $students = $query->offset($pages->offset)->limit('10')
                ->where(['recruiter_id'=> ($recruiter_id)?$recruiter_id:null])
                ->orwhere(['ID'=>($student_id)?$student_id:null])
                ->orwhere(['lead_status'=>($status)?$status:null])
                ->orderBy(['ID'=>SORT_DESC])
                ->all();
            }
            
        }else{
            $query = \common\models\Student::find();
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            $students = $query->offset($pages->offset)->limit('10')->orderBy(['ID'=>SORT_DESC])->all();
        }

        return $this->render('lead_student',['leadStatus'=>$leadStatus,'students'=>$students,'pages' => $pages,'model'=>$model]);
    }

    public function actionChangestatus(){
        $statusname=Yii::$app->request->post('id');
        $stu_id=Yii::$app->request->post('stu_id');
        $leadStatus=LeadStatuses::find()->where(['name'=>$statusname])->one();
        $model=\common\models\Student::findOne($stu_id);
        $model->lead_status=$leadStatus->id;
        $recruiter=\common\models\Recruiters::findOne($model['recruiter_id']);
        $model->save(false);
        $history=new \common\models\LeadHistory();
        $history->name=$statusname;
        $history->student_id=$stu_id;
        $history->recruiter_id=$model->recruiter_id;
        $history->date_created=date('Y-m-d');
        $history->save(false);

        $notification=new \common\models\Notification();
        $notification->created_by='Application Team ('.Yii::$app->user->identity->id.')';
        $notification->created_at=date('Y-m-d');
        $notification->module='Leads for '.$model->first_name;
        $notification->name=$history->name;
        $notification->created_by_id=$history->id; //primary key
        $notification->receiver_id=$history->recruiter_id; //who receive
        $notification->created_by=Yii::$app->user->identity->username; //who created
        $notification->save(false);
       
        $mail = Yii::$app->mailer->compose('@common/mail/applicationteam/leademail', ['model' => $history])
                ->setFrom('noreply@universitybureau.com')
                // ->setTo('salman.u360@gmail.com')
                ->setTo($recruiter['email'])
                ->setSubject('Lead Status from application team')
                // ->setHtmlBody('<p>Thank you..! You Registration is successful with <i>University bureau </i>. You will recieve your login username and password via email after admin approve you.</p>')
                ->send();
        $this->redirect('leademail');  

        // return json_encode(['status'=>$statusname]);
    }

    public function actionLeademail(){
        return $this->redirect('leadstudent');
    }

    /**
     * Displays a single LeadStatuses model.
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
     * Creates a new LeadStatuses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LeadStatuses();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LeadStatuses model.
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
     * Deletes an existing LeadStatuses model.
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
     * Finds the LeadStatuses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LeadStatuses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LeadStatuses::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
