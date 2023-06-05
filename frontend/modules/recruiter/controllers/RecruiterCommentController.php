<?php

namespace frontend\modules\recruiter\controllers;
use Yii;
use common\models\RecruiterComment;
use common\models\RecruiterCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecruiterCommentController implements the CRUD actions for RecruiterComment model.
 */
class RecruiterCommentController extends Controller
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
     * Lists all RecruiterComment models.
     *
     * @return string
     */
    public function actionIndex()
    {
         $this->layout = 'inner';
        $searchModel = new RecruiterCommentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionNotificationseen()
        {
            $update     = "UPDATE  notification SET status = 1  where status =0 and receiver_id=".Yii::$app->user->identity->recruiter->id;
            \Yii::$app->db->createCommand($update)->execute();
            return $this->redirect(['index']);
        }

    /**
     * Displays a single RecruiterComment model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'inner';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RecruiterComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
         $this->layout = 'inner';
        $model = new RecruiterComment();
        if ($this->request->isPost) {
            $recuitername=Yii::$app->user->identity->recruiter->owner_first_name;
            if ($model->load($this->request->post())) {
                $model->save();
                $notification=new \common\models\Notification();
                $notification->created_by='Recruiter ('.$recuitername.')';
                $notification->created_at=date('Y-m-d');
                $notification->module='Recruiter comment';
                $notification->name=$model->comment;
                $notification->created_by_id=$model->id; //created by id is model id
                $notification->save(false);
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
     * Updates an existing RecruiterComment model.
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
     * Deletes an existing RecruiterComment model.
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
     * Finds the RecruiterComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RecruiterComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecruiterComment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
