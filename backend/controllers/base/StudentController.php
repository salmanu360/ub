<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;
use Yii;
use frontend\models\ForStudents;
use backend\models\ForStudentsSearch;

use frontend\models\StudentSearch;
use common\models\Student;
use common\models\StudentForm;
use common\models\StudentCollegeForm;
use common\models\StudentCollegeAttended;

use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* StudentController implements the CRUD actions for ForStudents model.
*/
class StudentController extends Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all ForStudents models.
* @return mixed
*/
/* public function actionIndex()
{
    // $searchModel  = new ForStudentsSearch;
    $searchModel  = new StudentSearch;
    $dataProvider = $searchModel->search($_GET);

Tabs::clearLocalStorage();

Url::remember();
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->render('index', [
'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
]);
} */

    public function actionIndex()
    {
        $searchModel  = new StudentSearch;
        $dataProvider = $searchModel->searchadmin($_GET);
        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;
        return $this->render('index', [
        'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

/**
* Displays a single ForStudents model.
* @param integer $id
*
* @return mixed
*/
    public function actionView($ID)
    {
        $model=Student::findOne($ID);
        // echo '<pre>';print_r($model);die;
        // echo $model->ID;die;
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
        'model' =>$model,
        ]);
    }


    public function actionDownloaddocument($id,$c)
    {
        //echo $c;die;
        $model =  Student::findOne($id);
        $file=$model->ten_certificate;
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $mainroot=$convertPath.'uploads/doc_student/'.$c;
        if (file_exists($mainroot)) {
            return Yii::$app->response->sendFile($mainroot);
        } else {
            throw new \yii\web\NotFoundHttpException("{$file} is not found!");
        }
    }

/**
* Creates a new ForStudents model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
$model = new Student;

try {
if ($model->load($_POST) && $model->save()) {
return $this->redirect(['view', 'id' => $model->id]);
} elseif (!\Yii::$app->request->isPost) {
$model->load($_GET);
}
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
$model->addError('_exception', $msg);
}
return $this->render('create', ['model' => $model]);
}

/**
* Updates an existing ForStudents model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id
* @return mixed
*/
public function actionUpdate($id)
{
$model = $this->findModel($id);

if ($model->load($_POST) && $model->save()) {
return $this->redirect(Url::previous());
} else {
return $this->render('update', [
'model' => $model,
]);
}
}

/**
* Deletes an existing ForStudents model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $id
* @return mixed
*/
public function actionDelete($ID)
{
try {
$this->findModel($id)->delete();
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
\Yii::$app->getSession()->addFlash('error', $msg);
return $this->redirect(Url::previous());
}

// TODO: improve detection
$isPivot = strstr('$id',',');
if ($isPivot == true) {
return $this->redirect(Url::previous());
} elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
Url::remember(null);
$url = \Yii::$app->session['__crudReturnUrl'];
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->redirect($url);
} else {
return $this->redirect(['index']);
}
}

/**
* Finds the ForStudents model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id
* @return ForStudents the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($ID)
{
if (($model = Student::findOne($ID)) !== null) {
return $model;
} else {
throw new HttpException(404, 'The requested page does not exist.');
}
}
}
