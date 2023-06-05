<?php

namespace backend\controllers;
use Yii;
use common\models\RmApplicationTeamComment;
use common\models\RmApplicationTeamCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\UploadForm;
/**
 * RmApplicationTeamCommentController implements the CRUD actions for RmApplicationTeamComment model.
 */
class RmApplicationTeamCommentController extends Controller
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
     * Lists all RmApplicationTeamComment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RmApplicationTeamCommentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RmApplicationTeamComment model.
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
     * Creates a new RmApplicationTeamComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
     public function actionRmcomment($id)
    {
        $searchModel = new RmApplicationTeamCommentSearch();
        $dataProvider = $searchModel->searchstudent($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionDownloaddocument($id)
    {
        $model =  RmApplicationTeamComment::findOne($id);
        $file=$model->file;
        $mainroot = Yii::getAlias('@webroot/uploads/rmcommentapplicatonteam/'.$file);
        if (file_exists($mainroot)) {
            return Yii::$app->response->sendFile($mainroot);
        } else {
            throw new \yii\web\NotFoundHttpException("{$file} is not found!");
        }
    }
    public function actionCreate()
    {
        $model = new RmApplicationTeamComment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $modelUploadForm = new UploadForm();
                $modelUploadForm->file = UploadedFile::getInstance($model, 'file');
                if(!empty($modelUploadForm->file->extension)){
                    
                    $image_name=uniqid() . '.' . $modelUploadForm->file->extension;
                    //echo $image_name;die;
                    $model->file=$image_name;
                    $mainpath = Yii::getAlias('@webroot/');
                    //$convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
                    $modelUploadForm->file->saveAs($mainpath.'uploads/rmcommentapplicatonteam/' . $image_name);
                }

                $model->file2='test';
                $model->save(false);
                $notification=new \common\models\Notification();
                $Student=\common\models\Student::find()->where(['ID'=>$model->student_id])->one();
                $Recruiters=\common\models\Recruiters::findOne($model->recruiter_id);
                $User=\common\models\User::find()->where(['type'=>6])->all();
                $notification->module='Comment Application Team';
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
                ->setSubject('Comment To Application Team by RM')
                ->setHtmlBody('
                <p>Hello: admin following comment made by RM to Application Team </p>
                <p>Comment: '.$model->comment.'</p>
                <p>Student: '.$Student->first_name .' '.$Student->last_name.'</p>
                <p>Recruiter: '.$Recruiters->owner_first_name .' '.$Recruiters->owner_last_name.'</p>
                ')
                ->send();
                /* email to owner end */
                /* email to all appliation team */
                foreach($User as $alluser){
                $mail = Yii::$app->mailer->compose()
                ->setFrom('noreply@universitybureau.com')
                ->setTo($alluser->email)
                ->setSubject('Comment To Application Team by RM')
                ->setHtmlBody('
                <p>Hello: following comment made by RM to Application Team </p>
                <p>Comment: '.$model->comment.'</p>
                <p>Student: '.$Student->first_name .' '.$Student->last_name.'</p>
                <p>Recruiter: '.$Recruiters->owner_first_name .' '.$Recruiters->owner_last_name.'</p>
                ')
                ->send();
                }
                /* email to all appliation team end*/


                

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
     * Updates an existing RmApplicationTeamComment model.
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
     * Deletes an existing RmApplicationTeamComment model.
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
     * Finds the RmApplicationTeamComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RmApplicationTeamComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RmApplicationTeamComment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
