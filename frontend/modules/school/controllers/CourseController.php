<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\modules\school\controllers;

use common\models\Course;
    use frontend\models\CourseSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use common\models\School;
/**
* CourseController implements the CRUD actions for Course model.
*/
class CourseController extends Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all Course models.
* @return mixed
*/
public function actionIndex()
{
    $this->layout='./inner';  
    $searchModel  = new CourseSearch;
    $dataProvider = $searchModel->search($_GET);
    $dataProvider->query->where(['school.id'=>\Yii::$app->user->identity->school->id]);

Tabs::clearLocalStorage();

Url::remember();
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->render('index', [
'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
]);
}

/**
* Displays a single Course model.
* @param integer $id
*
* @return mixed
*/
public function actionView($id)
{
    $this->layout='./inner';     
\Yii::$app->session['__crudReturnUrl'] = Url::previous();
Url::remember();
Tabs::rememberActiveState();

return $this->render('view', [
'model' => $this->findModel($id),
]);
}

/**
* Creates a new Course model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
 
$this->layout='./inner';    
$model = new Course;

try {
if ($model->load($_POST) ) {
               
  $user_id = \Yii::$app->user->identity->id;
  $user = School::find()->where(['user_id'=>$user_id])->one();  
    $model->college_id=$user->id;
    
    if($model->save()){
        return $this->redirect(['view', 'id' => $model->id]);
    }else{
        $model->addError('_exception',"Internal server Error");
        return $this->render('create', ['model' => $model]);  
    }

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
* Updates an existing Course model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id
* @return mixed
*/
public function actionUpdate($id)
{
   
$this->layout='./inner';  

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
* Deletes an existing Course model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $id
* @return mixed
*/
public function actionDelete($id)
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
* Finds the Course model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id
* @return Course the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($id)
{
if (($model = Course::findOne($id)) !== null) {
return $model;
} else {
throw new HttpException(404, 'The requested page does not exist.');
}
}

public function actionLogout()
{

    \Yii::$app->user->logout();


    return  $this->redirect(['/site/login']);
}
}
