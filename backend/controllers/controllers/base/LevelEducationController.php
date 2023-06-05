<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;
use Yii;
use common\models\LevelEducation;
    use backend\models\LevelEducationSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* LevelEducationController implements the CRUD actions for LevelEducation model.
*/
class LevelEducationController extends Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all LevelEducation models.
* @return mixed
*/
public function actionIndex()
{
    $searchModel  = new LevelEducationSearch;
    $dataProvider = $searchModel->search($_GET);

Tabs::clearLocalStorage();

Url::remember();
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->render('index', [
'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
]);
}

/**
* Displays a single LevelEducation model.
* @param integer $id
*
* @return mixed
*/
public function actionView($id)
{
\Yii::$app->session['__crudReturnUrl'] = Url::previous();
Url::remember();
Tabs::rememberActiveState();

return $this->render('view', [
'model' => $this->findModel($id),
]);
}

/**
* Creates a new LevelEducation model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
$model = new LevelEducation;

try {
if ($model->load($_POST)) {
    $model->save();

     $History=new \common\models\History();
    $History->action='Education level';
    $History->action='Create';
    $History->created_by=Yii::$app->user->id;
    $History->created_at=date('Y-m-d');
    $History->save(false);

    $notification=new \common\models\Notification();
    $notification->created_by=Yii::$app->user->id;
    $notification->created_at=date('Y-m-d');
    $notification->module='new Education level added';
    $notification->save(false);
    
    return $this->redirect(['view', 'id' => $model->id]);
// echo("<script>location.href = 'https://universitybureau.com/backend/web/level-education/view?id=$model->id';</script>");
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
* Updates an existing LevelEducation model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id
* @return mixed
*/
public function actionUpdate($id)
{
$model = $this->findModel($id);

if ($model->load($_POST) && $model->save()) {
    $History=new \common\models\History();
    $History->module='Education level';
    $History->action='Update';
    $History->created_at=date('Y-m-d');
    $History->created_by=Yii::$app->user->id;
    $History->save(false);
    return $this->redirect(['view', 'id' => $model->id]);
// echo("<script>location.href = 'https://universitybureau.com/backend/web/level-education/view?id=$model->id';</script>");
} else {
return $this->render('update', [
'model' => $model,
]);
}
}

/**
* Deletes an existing LevelEducation model.
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
* Finds the LevelEducation model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id
* @return LevelEducation the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($id)
{
if (($model = LevelEducation::findOne($id)) !== null) {
return $model;
} else {
throw new HttpException(404, 'The requested page does not exist.');
}
}
}
