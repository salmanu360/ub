<?php
namespace frontend\modules\recruiter\controllers;
use Yii;
use common\models\RecruiterStudentComment;
use common\models\RecruiterStudentCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecruiterStudentCommentController implements the CRUD actions for RecruiterStudentComment model.
 */
class RecruiterStudentCommentController extends Controller
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
     * Lists all RecruiterStudentComment models.
     *
     * @return string
     */
    public function actionIndex()
    {
         $this->layout = 'inner';
        $searchModel = new RecruiterStudentCommentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecruiterStudentComment model.
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

    public function actionViews($sid)
    {
         $this->layout = 'inner';
         $model=RecruiterStudentComment::find()->where(['student_id'=>$sid])->all();
        return $this->render('views', [
            'model' => $model,
        ]);
    }
    

    /**
     * Creates a new RecruiterStudentComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RecruiterStudentComment();

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
     * Updates an existing RecruiterStudentComment model.
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


    public function actionReply($id,$rid)
    {
        $model = new RecruiterStudentComment();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->save(false);
                $username= Yii::$app->user->identity->username;
                $notification=new \common\models\Notification();
                $notification->created_by='Admin ('.$username.')';
                $notification->created_at=date('Y-m-d');
                $notification->module='Comment';
                $notification->name=$model->comment;
                $notification->created_by_id=$model->id; //primary key
                $notification->receiver_id=$model->recruiter_id;
                $notification->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('reply', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RecruiterStudentComment model.
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
     * Finds the RecruiterStudentComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RecruiterStudentComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecruiterStudentComment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
