<?php

namespace frontend\modules\recruiter\controllers;
use Yii;
use common\models\RmRecruiterComment;
use common\models\RmRecruiterCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RmRecruiterCommentController implements the CRUD actions for RmRecruiterComment model.
 */
class RmRecruiterCommentController extends Controller
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
     * Lists all RmRecruiterComment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'inner';
        $searchModel = new RmRecruiterCommentSearch();
        $dataProvider = $searchModel->searchrecruiter($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RmRecruiterComment model.
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
     * Creates a new RmRecruiterComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $this->layout = 'inner';
        $model = new RmRecruiterComment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                $Student=\common\models\Student::find()->where(['ID'=>$model->student_id])->one();
                $notification=new \common\models\Notification();
                $notification->created_by='RM ('.Yii::$app->user->identity->username.')';
                $notification->created_at=date('Y-m-d');
                $notification->module='Comment Recruiter';
                $notification->name=$Student->first_name;
                $notification->created_by_id=$Student->ID;
                $notification->save(false);
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create_rm_comment', [
            'model' => $model,
            'id' => $id,
        ]);
    }
    public function actionCreatecomment($sid,$rm_id)
    {
        $this->layout = 'inner';
        $model = new RmRecruiterComment();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->recruiter_id=Yii::$app->user->identity->recruiter->id;
                $model->student_id=$sid;
                $model->rm_id=$rm_id;
                $model->save();
                $Student=\common\models\Student::find()->where(['ID'=>$model->student_id])->one();
                $notification=new \common\models\Notification();
                $notification->created_by='Recruiter ('.Yii::$app->user->identity->recruiter->id.')';
                $notification->created_at=date('Y-m-d');
                $notification->module='Comment Recruiter';
                $notification->name=$Student->first_name;
                $notification->created_by_id=$Student->ID;
                $notification->save(false);
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create_rm_comment', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing RmRecruiterComment model.
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
     * Deletes an existing RmRecruiterComment model.
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
     * Finds the RmRecruiterComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RmRecruiterComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RmRecruiterComment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
