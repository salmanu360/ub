<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;
use Yii;
use common\models\Course;
use common\models\School;
use common\models\ExcelUpload;
use common\models\CourseSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use moonland\phpexcel\Excel;
use yii\web\UploadedFile;

/**
* CourseController implements the CRUD actions for CourseController model.
*/
class CourseController extends Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all TagCategory models.
* @return mixed
*/
    public function actionIndex()
    {
        $searchModel  = new CourseSearch;
        $dataProvider = $searchModel->search($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;
        if( \Yii::$app->user->identity->type==5){
               //  return $this->render('index');
              return $this->render('index_rm', [
            'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
            }else{
        return $this->render('index', [
        'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
            }
    }
    
     public function actionGetstate(){
      $id=Yii::$app->request->post('id');
      $group=\common\models\State::find()->where(['country_id'=>$id])->all();
      $options = "<option selected='selected'>Select</option>";
      foreach($group as $group)
      {
        $options .= "<option value='".$group->id."'>".$group->name."</option>";
      }
      return $options;
    }

    public function actionUploadexcel()
    {
        $searchModel  = new CourseSearch;
        $dataProvider = $searchModel->search($_GET);
        Tabs::clearLocalStorage();
        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;
        return $this->render('upload_excel', [
        'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


    public function actionCourseuploadexcel(){
        // header('Content-Type: text/html; charset=utf-8');
        $model=new ExcelUpload();
        // echo '<pre>';print_r($_FILES);die;
        if(!empty($_FILES['file']['name'])){
            $filename = $_FILES['file']['name'];
            $filetmpname = $_FILES['file']['tmp_name'];
            $result = $this->uploadFile($filename, $filetmpname);
            if($result['status'] === false){
                Yii::$app->session->setFlash('error', $result['message']);
                return $this->redirect(['uploadexcel']);
                } else {
                    $model->file=$result['filename'];
                    $model->date_created=date('Y-m-d');
                    $model->save(false);
                }
         }
         $file_name = Yii::getAlias('@webroot/uploads/excel/'.$model->file);
        // $file_name =  $_FILES['file']['name'];
        $row = 1;
        if (($handle = fopen($file_name, "r")) !== FALSE) {
            while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
                //  echo '<pre>';print_r($data);continue;
                $num = 4;
                $row++;
               if($row != 2 && $row < 2473)
                { 
                        //  echo '<pre>';print_r($data);
                        $Course  = new Course();
                        $Course->college_id=trim($data[0]); 
                        $Course->application_fee=trim($data[1]); 
                        $Course->registeration_fee=trim($data[2]);
                        $Course->tution_fee=trim($data[3]);
                        $Course->currency=trim($data[4]);
                        $Course->name=$data[5];
                        $Course->duration=trim($data[6]); 
                        $Course->discount=trim($data[6]);
                        $Course->tags=trim($data[8]);
                        $Course->status=trim($data[9]);
                        $Course->comment=trim($data[10]);
                        $Course->recruiter_id=trim($data[11]);
                        $Course->save(false);
                 }

            }
            \Yii::$app->getSession()->addFlash('success', 'Data uploaded successfully');
            return $this->redirect(['index']);
        }
    }

    public function uploadFile($filename, $tmpname) {

        $output = [];
        $upload_dir = Yii::getAlias('@webroot').'/uploads/excel/';        
        
        if(!empty($filename)){

            $target_file = $upload_dir . basename($filename);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if($imageFileType != "csv") {               
                return $output = [
                    'status' => false,
                    'message' => "Sorry, only csv files are allowed."
                ];
            }
           
           /* if (file_exists($target_file)) {                
                return $output = [
                    'status' => false,
                    'message' => "Sorry, file already exists."
                ];
            }*/

            if (move_uploaded_file($tmpname, $target_file)) {
                return $output = [
                    'status' => true,
                    'message' => "Hurray, File uploaded successfully.",
                    'filename' => $filename
                ];
            } else {
                return $output = [
                    'status' => false,
                    'message' => "Sorry, File can not be uploaded."
                ];
            }
        } else {
            return $output = [
                'status' => false,
                'message' => "Sorry, File not found."
            ];
        } 
    }


    public function actionImportlocation(){
        header('Content-Type: text/html; charset=utf-8');
        $file_name = Yii::app()->basePath.'/dataload/location.csv';
        //exit;
        $row = 1;
        $arr=array();
        if (($handle = fopen($file_name, "r")) !== FALSE) {
            while (($data = fgetcsv($handle,1000, ",")) !== FALSE) {
            	/*echo '<pre>';print_r($data);
            	continue;*/
                $num = 4;
                $row++;
                if($row != 2 && $row < 2473)
                {
                     $userId = 61;
                    $checkStates = States::model()->findByAttributes(array('code'=>trim($data[7])));
                    if(!empty($checkStates['id'])){
                    	$stateName=$checkStates['id'];
                    }else{
                    	$stateName=trim($data[7]);
                    }
                    //if( !$checkUnique )
                    //$checkUnique = Location::model()->countByAttributes(array('name'=>trim($data[2])));
                    //if( !$checkUnique ) {
                        $model  = new Location;
                        $model->location_market= trim($data[0]);
                        $model->code= trim($data[1]);
                        $model->name= trim($data[2]);
                        $model->save(false);
                    //}
                }
            }
        }
    }

    public function actionCourseuploadexcel1()
    {
        // $config;
        // echo $file_name = $_FILES['file'];die;
        // echo '<pre>';print_r($_POST);die;
        $inputFile = $_FILES['file']['tmp_name'];
        // $inputFileType =Excel::import($inputFile);

        $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import',
            'fileName' => $inputFile,
            'setFirstRecordAsKeys' => false, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
            'setIndexSheetByName' => false, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
            'getOnlySheet' => 0, // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);
        // $inputFileType = Excel::import($inputFile);
       
        echo '<pre>';print_r($data);die;

        $ok_count = 0;
    $status_arr = [];
    $final_data = isset($data[0]) ? $data[0] : $data;
    foreach($final_data as $key=>$value)
    {
      

    }
    die;
        $transaction = Yii::$app->db->beginTransaction();
        foreach ($inputFileType as $index => $row) {
                    $Course = new Course;
                    $Course->application_fee = $row["application_fee"];
                    $Course->tution_fee = $row["tution_fee"];
                    $Course->currency = $row["currency"];
                    $Course->name = $row["name"];
                    $Course->discount = $row["discount"];
                    $Course->tags = $row["tags"];
                    $Course->college_id = 1;
                    $Course->save(false); 
        }
        Yii::$app->session->setFlash('success', "Course imported successfully");
        $this->redirect('uploadexcel');
        $transaction->commit();
    }

    

/**
* Displays a single TagCategory model.
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
* Creates a new TagCategory model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
    public function actionCreate()
    {
        $model = new Course;
        // echo '<pre>';print_r($_POST);die;
        try {
        if ($model->load($_POST)) {
            $model->year=date('Y');
            $model->program=$_POST['Course']['program'];
            $model->country_id=$_POST['Course']['country_id'];
            $model->province=$_POST['Course']['province'];
            $model->course_category=$_POST['Course']['course_category'];
            $model->save(false);
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
* Updates an existing TagCategory model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id
* @return mixed
*/
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($_POST)) {
            // echo '<pre>';print_r($_POST);die;
           // echo $_POST['Course']['country_id'];die;
             $model->program=$_POST['Course']['program'];
             $model->country_id=$_POST['Course']['country_id'];
            $model->province=$_POST['Course']['province'];
            $model->course_category=$_POST['Course']['course_category'];
             $model->save();
        // return $this->redirect(Url::previous());
        return $this->redirect(['view', 'id' => $model->id]);
        } else {
        return $this->render('update', [
        'model' => $model,
        ]);
        }
    }

/**
* Deletes an existing TagCategory model.
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
* Finds the TagCategory model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id
* @return TagCategory the loaded model
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
}
