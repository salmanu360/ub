<?php

namespace backend\controllers;
use Yii;
use common\models\AssignStudentApplicationTeam;
use common\models\AssignStudentApplicationTeamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssignStudentApplicationTeamController implements the CRUD actions for AssignStudentApplicationTeam model.
 */
class AssignStudentApplicationTeamController extends Controller
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


    public function actionAssignstuapplicationteam($id)
    {
       $model = new AssignStudentApplicationTeam();
       $model->student_id=$id;
       $model->application_team_id=1;
       $model->created_by=Yii::$app->user->id;
       $model->save(false);
        $notification=new \common\models\Notification();
        $Student=\common\models\Student::find()->where(['ID'=>$id])->one();
        $Recruiters=\common\models\Recruiters::findOne($Student->recruiter_id);
        $User=\common\models\User::find()->where(['type'=>6])->all();
        $notification->module='Assign student to Application Team';
        $notification->status=0;
        $notification->created_at=date('Y-m-d');
        $notification->created_by='('.Yii::$app->user->identity->username.')';
        $notification->name=$Student->first_name;
        $notification->created_by_id=$Student->ID;
        $notification->receiver_id=6;
        $notification->save(false);
        /* email to owner */
        $mail = Yii::$app->mailer->compose()
        ->setFrom('noreply@universitybureau.com')
        ->setTo('support@universitybureau.com')
        ->setSubject('Assign student to Application Team By RM')
        ->setHtmlBody('
        <p>Hello: admin following student assign to Application Team by RM </p>
        <p>Student: '.$Student->first_name .' '.$Student->last_name.'</p>
        <p>Recruiter: '.$Recruiters->owner_first_name .' '.$Recruiters->owner_last_name.'</p>
        <p>Assign by RM: '.Yii::$app->user->identity->username.'</p>
        ')
        ->send();
        /* email to owner end */

        /* email to all appliation team */
        foreach($User as $alluser){
            $mail = Yii::$app->mailer->compose()
            ->setFrom('noreply@universitybureau.com')
            ->setTo($alluser->email)
            ->setSubject('Assign student to Application Team By RM')
            ->setHtmlBody('
            <p>Hello: following student assign to Application Team by RM </p>
            <p>Student: '.$Student->first_name .' '.$Student->last_name.'</p>
            <p>Recruiter: '.$Recruiters->owner_first_name .' '.$Recruiters->owner_last_name.'</p>
            <p>Assign by RM: '.Yii::$app->user->identity->username.'</p>
            ')
            ->send();
            }
            /* email to all appliation team end*/
            return $this->redirect(['index']);

    }

    /**
     * Lists all AssignStudentApplicationTeam models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AssignStudentApplicationTeamSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssignStudentApplicationTeam model.
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
     * Creates a new AssignStudentApplicationTeam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AssignStudentApplicationTeam();

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
     * Updates an existing AssignStudentApplicationTeam model.
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
     * Deletes an existing AssignStudentApplicationTeam model.
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
     * Finds the AssignStudentApplicationTeam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AssignStudentApplicationTeam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssignStudentApplicationTeam::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
