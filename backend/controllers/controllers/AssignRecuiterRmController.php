<?php

namespace backend\controllers;
use yii;
use common\models\AssignRecuiterRm;
use common\models\AssignRecuiterRmSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssignRecuiterRmController implements the CRUD actions for AssignRecuiterRm model.
 */
class AssignRecuiterRmController extends Controller
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
    
    public $enableCsrfValidation = false;

    /**
     * Lists all AssignRecuiterRm models.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        if(isset($_POST['notes'])){
            $RecruiterNotes=new \common\models\RecruiterNotes();
            $RecruiterNotes->notes=$_POST['notes'];
            $RecruiterNotes->created_by=Yii::$app->user->id;
            $RecruiterNotes->recruiter_id=$_POST['recruiter_id'];
            $RecruiterNotes->save(false);
        }
        $searchModel = new AssignRecuiterRmSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $type= Yii::$app->user->identity->type;
        
        if($type==5){
            return $this->render('indexrm', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
    }
    
    public function actionExport()
    {
        $searchModel = new AssignRecuiterRmSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 500];
        $filename = 'Data-'.Date('YmdGis').'-assignrecruiters.xls';
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        return $this->renderPartial('export_assign_recruiter', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }

    /**
     * Displays a single AssignRecuiterRm model.
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
     * Creates a new AssignRecuiterRm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AssignRecuiterRm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $exist=AssignRecuiterRm::find()->where(['recruiter_id'=>$_POST['AssignRecuiterRm']['recruiter_id']])->one();
                if($exist){
                    /* echo "<script>
                    window.addEventListener('load',function(){
                    swal('Warning !', 'This recruiter already assigned', 'danger');
                    window.location.href = 'affiliates/index';
                  });</script>"; */
                  return $this->redirect(['create','exist'=>1]);
                }
                $model->save();
                $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                $User=\common\models\User::findOne($model->rm_id);
                 $Recruitersemail=$Recruiters->email;
                 $mail = Yii::$app->mailer->compose()
                        ->setFrom('noreply@universitybureau.com')
                        //->setTo('salman.u360@gmail.com')
                        ->setTo($Recruitersemail)
                        ->setSubject('Recruiter assign')
                        ->setHtmlBody('
                        <p>Hello: '.$Recruiters->owner_first_name.' </p>
                        <p>The below RM is assign to you</p>
                        <p>RM: '.$User->username.' ('. $User->email.')</p>
                        ')
                        ->send();
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
     * Updates an existing AssignRecuiterRm model.
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
     * Deletes an existing AssignRecuiterRm model.
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
     * Finds the AssignRecuiterRm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AssignRecuiterRm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssignRecuiterRm::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
