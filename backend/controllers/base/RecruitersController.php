<?php
namespace backend\controllers\base;
use Yii;
use common\models\Recruiters;
use backend\models\RecruitersSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use yii\web\UploadedFile;
use common\models\UploadForm;
use common\models\UploadFormBackend;

/**
* RecruitersController implements the CRUD actions for Recruiters model.
*/
class RecruitersController extends Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all Recruiters models.
* @return mixed
*/
public function actionIndex()
{
    
    if(isset($_POST['notes'])){
        //echo '<pre>';print_r($_POST);die;
        $RecruiterNotes=new \common\models\RecruiterNotes();
        $RecruiterNotes->notes=$_POST['notes'];
        $RecruiterNotes->created_by=Yii::$app->user->id;
        $RecruiterNotes->recruiter_id=$_POST['recruiter_id'];
        $RecruiterNotes->save(false);
        
    }
    /* Yii::$app->mailer->compose()
     ->setFrom('noreply@universitybureau.com')
     ->setTo('salman.u360@gmail.com')
     ->setSubject('Email sent from Yii2-Swiftmailer')
     ->send();
     die; */
    // die('salman');
    $searchModel  = new RecruitersSearch;
    $dataProvider = $searchModel->search($_GET);

Tabs::clearLocalStorage();

Url::remember();
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->render('index', [
'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
]);
}


public function actionShownotes()
{
$id=$_POST['id'];
$recruiterNotes = \common\models\RecruiterNotes::find()->where(['recruiter_id'=>$id])->all();
$view= $this->renderPartial('shownotes', [
    'recruiterNotes' => $recruiterNotes,
    ]);
return json_encode(['view'=>$view]);

}
public function actionExport()
    {
        $searchModel = new RecruitersSearch();

        $dataProvider = $searchModel->search($_GET);
        $dataProvider->pagination = ['pageSize' => 5000];
        $filename = 'Data-'.Date('YmdGis').'-recruiters.xls';
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        return $this->renderPartial('export_recruiter', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }
public function actionChat(){
    return $this->render('chat');
}
public function actionSendChat() {
    //        $message = $_POST['message'];
            $message = \Yii::$app->request->post('message');
            if ($message) {
                $model = new Chat;
                $model -> message = $message;
                if ($model -> save()) {
                    echo ChatRoom::data();
                } else {
                    print_r($model -> getErrors());
                    exit(0);
                }
            }
            return $this -> render('sendChat',
                ['model' => $message]
                );
        }



    public function actionDownloaddocument($id,$c)
    {
        //echo $c;die;
        $model =  Recruiters::findOne($id);
        $file=$model->ten_certificate;
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        $mainroot=$convertPath.'uploads/'.$c;
        if (file_exists($mainroot)) {
            return Yii::$app->response->sendFile($mainroot);
        } else {
            throw new \yii\web\NotFoundHttpException("{$file} is not found!");
        }
    }

/**
* Displays a single Recruiters model.
* @param integer $id
*
* @return mixed
*/
public function actionView($id)
{
    
/* \Yii::$app->session['__crudReturnUrl'] = Url::previous();
Url::remember();
Tabs::rememberActiveState(); */

return $this->render('view', [
'model' => $this->findModel($id),
]);
}

/**
* Creates a new Recruiters model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
    public function actionCreate()
    {
        $model = new Recruiters;
        try {
       if ($model->load(Yii::$app->request->post())) {
            $modelUploadForm = new UploadForm();
            $modelUploadForm->comp_logo = UploadedFile::getInstance($model, 'comp_logo');
            if(!empty($modelUploadForm->comp_logo->extension)){
                $image_name=uniqid() . '.' . $modelUploadForm->comp_logo->extension;
                $model->comp_logo =  $image_name;
                $mainpath = Yii::getAlias('@webroot/');
                $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
                $modelUploadForm->comp_logo->saveAs($convertPath.'uploads/' . $image_name);
            }

            


            $model->save(false);
            //echo '<pre>';print_r($model->getErrors());die;
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
* Updates an existing Recruiters model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id
* @return mixed
*/
    public function actionUpdate($id)
    {
        /* frontend path */
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        /* frontend path end*/
        $model = $this->findModel($id);
        $model1 =  Recruiters::findOne($id);
        
        if ($model->load($_POST)) {
            if(!empty(UploadedFile::getInstance($model, 'comp_logo'))){ 
                $modelUploadForm = new UploadForm();
                $modelUploadForm->comp_logo = UploadedFile::getInstance($model, 'comp_logo');
                    if(!empty($modelUploadForm->comp_logo->extension)){
                        $image_name=uniqid() . '.' . $modelUploadForm->comp_logo->extension;
                        $model->comp_logo =  $image_name;
                        $mainpath = Yii::getAlias('@webroot/');
                        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
                        $modelUploadForm->comp_logo->saveAs($convertPath.'uploads/' . $image_name);
                    }else{
                        $model->comp_logo=$model1->comp_logo;
                    }
                }else{
                    $model->comp_logo=$model1->comp_logo;
                }


                
                    
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
        return $this->render('update', [
        'model' => $model,
        ]);
        }
    }

    
    public function actionBulkdelete(){
        $data=Yii::$app->request->post('bulk_delete');
        $bulkDeleteIds = Recruiters::find()->where(['id'=>$data])->all();
            foreach ($bulkDeleteIds as $value){
               $value->delete(false);
            }
            return $this->redirect(['index']);
    }


    /* public function actionApprove($id){
        $model=  Recruiters::findOne($id);
        $model->status=1;
        $model->save(false);
        \Yii::$app->getSession()->addFlash('success', "Recruiter approve successfully");

        return $this->redirect(['index']);
    }

    public function actionDisapprove($id){
        $model=  Recruiters::findOne($id);
        $model->status=0;
        $model->save(false);
        \Yii::$app->getSession()->addFlash('success', "Recruiter disapprove successfully");
        return $this->redirect(['index']);
    } */

/**
* Deletes an existing Recruiters model.
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
* Finds the Recruiters model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id
* @return Recruiters the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($id)
{
if (($model = Recruiters::findOne($id)) !== null) {
return $model;
} else {
throw new HttpException(404, 'The requested page does not exist.');
}
}
}
