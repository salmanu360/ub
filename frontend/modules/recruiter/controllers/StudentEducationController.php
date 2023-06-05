<?php

namespace frontend\modules\recruiter\controllers;

use common\models\StudentEducation;
use common\models\StudentEducationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentEducationController implements the CRUD actions for StudentEducation model.
 */
class StudentEducationController extends Controller
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
                        'delete' => ['GET'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all StudentEducation models.
     *
     * @return string
     */
     public function actionIndex($sid)
    {
        $this->layout = 'inner';

        $model = new StudentEducation();

       /* if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->student_id=$_POST['StudentEducation']['student_id'];
                $model->save(false);
                return $this->redirect(['index', 'sid' => $model->student_id,'id'=>$model->id]);
            }
        } */

        $searchModel = new StudentEducationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
            ]);
        }

    public function actionCreate()
        {
            $this->layout = 'inner';
            $model = new StudentEducation();
            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    $model->student_id=$_POST['StudentEducation']['student_id'];
                     $model->save(false);
                    return $this->redirect(['index','sid'=>$model->student_id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('_form', [
                'model' => $model,
            ]);
     }

         public function actionUpdate($sid,$id)
            {   
                 $this->layout = 'inner';
                $model = $this->findModel($id);

                if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['index', 'sid' => $sid]);
                }

                return $this->render('update', [
                    'model' => $model,
                ]);
            }

    /**
     * Displays a single StudentEducation model.
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
     * Creates a new StudentEducation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    

    /**
     * Updates an existing StudentEducation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
   

    /**
     * Deletes an existing StudentEducation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id,$sid)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index','sid'=>$sid]);
    }

    /**
     * Finds the StudentEducation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return StudentEducation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentEducation::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
