<?php

namespace frontend\modules\recruiter\controllers;

use Yii;
use yii\web\Controller;
use common\models\RecruitersForm;
use common\models\Recruiters;
use common\models\User;
use \yii\db\Query;
use yii\bootstrap4\ActiveForm;
use yii\web\Response;

use common\models\School;
use backend\models\SchoolSearch;
use dmstr\bootstrap\Tabs;
use yii\filters\AccessControl;
use common\models\MouForm;
use common\models\MouDetail; 
use kartik\mpdf\Pdf;

ini_set("max_execution_time", "-1");    
ini_set("memory_limit", "-1");  
ignore_user_abort(true);    
set_time_limit(0);


/**
 * Default controller for the `recruiter` module
 */
class DefaultController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'dashboard', 'programs-colleges'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => false,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }
    
    public function beforeAction($action) {
        if($action->id == 'mou'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionThankYou()
    {
        return $this->render('thank-you');
    }

    public function actionRegister()
    {
        $recruiterModel = new RecruitersForm();

        //for ajax validation
       /*  if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $recruiterModel->load(Yii::$app->request->post());
            return ActiveForm::validate($recruiterModel);
        } */

        if (Yii::$app->request->isPost) {
            if($recruiterModel->load(Yii::$app->request->post()) && $recruiterModel->save_recruiter()) {
                $notification=new \common\models\Notification();
                // $notification->created_by=$recruiterModel->user_id;
                $notification->created_at=date('Y-m-d');
                $notification->module='new recruiter register';
                $notification->save(false);

                $mail = Yii::$app->mailer->compose('@common/mail/recruiter/recruiter-invitation') 
                    ->setFrom('noreply@universitybureau.com')
                    ->setTo($recruiterModel->email)
                    ->setSubject('Congratulations...!! You have successfully registered.')
                    // ->setHtmlBody('<p>Thank you..! You Registration is successful with <i>University bureau </i>. You will recieve your login username and password via email after admin approve you.</p>')
                    ->send();

                if($mail){
                    Yii::$app->session->addFlash('success', 'Your registration has been successful');
                } else {
                   Yii::$app->session->addFlash('error', 'Email sending error'); 
                }    

                return $this->redirect(['/recruiter/thank-you']);
            }else{
                Yii::$app->session->addFlash('error', 'Registration Error');
                //return $this->redirect(['/']);
            }           
        }
        
        return $this->render('register', ['recruiterModel' => $recruiterModel]);
    }

    public function actionDashboard() {
       
        if(empty(Yii::$app->user->identity->recruiter->id)){
            return $this->redirect(['../site/logout1']);
        }
        $this->layout = 'inner';
        
        return $this->render('dashboard');
    }

    public function actionProfile() {
        $this->layout = 'inner';

        $id = Yii::$app->user->identity->id;

        $model = Recruiters::find()->andWhere(['user_id' => $id])->one();
        $recruiterModel = new RecruitersForm();         
       
        //$model = $this->findModel($ID);

        if (Yii::$app->request->isPost) {
            unset($_POST['Recruiters']['comp_logo']);
            unset($_POST['Recruiters']['bus_certificate']);
            if($model->load($_POST) /* && $model->save() */) {
                if( !empty($_FILES['Recruiters']['name']['comp_logo']) || !empty($_FILES['Recruiters']['name']['bus_certificate'])){
                    if(!empty($_FILES['Recruiters']['name']['comp_logo'])){
                        $filename = $_FILES['Recruiters']['name']['comp_logo'];
                        $filetmpname = $_FILES['Recruiters']['tmp_name']['comp_logo'];
        
                        $result = $recruiterModel->uploadImage($filename, $filetmpname);
                        if($result['status'] === false){
                            Yii::$app->session->setFlash('error', $result['message']);
                            return $this->redirect(['/recruiter/profile']);
                        } else {
                            $model->setAttribute('comp_logo', $result['filename']);
                           /*  if($model->save(false)){
                                Yii::$app->session->setFlash('success', $result['message']);
                            } */
                        }
                    }

                    if(!empty($_FILES['Recruiters']['name']['bus_certificate'])){
                        $filename = $_FILES['Recruiters']['name']['bus_certificate'];
                        $filetmpname = $_FILES['Recruiters']['tmp_name']['bus_certificate'];
        
                        $result = $recruiterModel->uploadFile($filename, $filetmpname);
                        if($result['status'] === false){
                            Yii::$app->session->setFlash('error', $result['message']);
                            return $this->redirect(['/recruiter/profile']);
                        } else {
                            $model->setAttribute('bus_certificate', $result['filename']);
                            /* if($model->save(false)){
                                Yii::$app->session->setFlash('success', $result['message']);
                            } */
                        }
                    } 
                } 
                
                if($model->save(false)){
                    Yii::$app->session->setFlash('success', "Profile updated successfully!");
                } 
                
            }else{
                Yii::$app->session->setFlash('error', 'Error in data saving');
                //return $this->redirect(['/']);
            }           
        }

       
        return $this->render('profile', [
            'model' => $model
        ]);
    }

    public function actionSettings() {
        $this->layout = 'inner';
        
        if (Yii::$app->request->isPost) {            
            $id = Yii::$app->request->post('user_id');
            $user = $this->findUserModel($id);  

            if(!empty(Yii::$app->request->post('new_password'))){
                
                $current_pass = Yii::$app->request->post('current_password');
                $hash = $user->password_hash;               

                if(!password_verify($current_pass, $hash)){
                    Yii::$app->session->setFlash('error', 'Incorrect current password');
                } else {
                    if( Yii::$app->request->post('new_password') !==  Yii::$app->request->post('confirm_password')){
                        Yii::$app->session->setFlash('error', 'Password doesn\'t match.'); 
                    } else {
                       
                        $new_password = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('new_password'));
                        $user->password_hash = $new_password;
                        if($user->save()){
                            Yii::$app->session->setFlash('success', 'Password changed successfully');
                        }
                    }
                }                
            }
            
            if(!empty( $_FILES['profile_pic']['name'] ) ) {
                $profile_pic = $user->upload_profile_pic();               
                $row = Yii::$app->db->createCommand()->update('user', ['profile_pic' => $profile_pic], 'id = '.$id)->execute();
                
                if($row > 0){
                    Yii::$app->session->setFlash('success', 'Settings updated successfully');
                } else {
                    Yii::$app->session->setFlash('error', 'Profile pic can not upload'); 
                }
            }
        } 

        return $this->render('account_settings');
    }

    public function actionRemove(){
        $flag = '';
        if(!empty($_GET['rec_id'])){
            $recruiter_id = $_GET['rec_id'];
            $attribute = $_GET['attr'];

            //$row = Yii::$app->db->createCommand()->delete('recruiters', ['id' => $id])->execute();
            if($attribute == 'comp_logo'){
                $row = Yii::$app->db->createCommand()->update('recruiters', ['comp_logo' => null], 'id = '.$recruiter_id)->execute();
            } elseif ($attribute == 'bus_certificate') {
                $row = Yii::$app->db->createCommand()->update('recruiters', ['bus_certificate' => null], 'id = '.$recruiter_id)->execute();
            }
            
            if($row){
                $flag = 'OK';
            }
        }
        echo $flag;
    }

    /*public function actionProgramsColleges(){
        $this->layout = 'inner';

        $searchModel  = new SchoolSearch;
        $dataProvider = $searchModel->search($_GET);

         

        return $this->render('programs-colleges', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }*/


    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionMou() {
        ///$this->layout = 'inner';
        if(\Yii::$app->user->isGuest && Yii::$app->controller->action->id !='login' && empty(Yii::$app->user->identity->recruiter->id)){
         \Yii::$app->response->redirect(['site/login']);
         return $this->redirect(['/site/login']);  
           //something code right here if user valided
        }
        $this->layout = 'blank';
        $recruiter_id = Yii::$app->user->identity->recruiter->id;
        
        $model = new MouForm();
        $modelMou = MouDetail::findOne(['recruiter_id' => $recruiter_id]);
        $recruiter = Recruiters::findOne(['id' => $recruiter_id]);
        
        if (Yii::$app->request->isPost) {

            if(isset($_POST['MouForm'])){
                $filename = $_FILES['MouForm']['name']['signature'];
                $tmpname = $_FILES['MouForm']['tmp_name']['signature'];
                $image = $model->uploadSignatureImage($filename, $tmpname);              

                $formData = [
                    'recruiter_id' => $recruiter_id,
                    'reference_id' => $model->generateRefNo(),
                    'signature' => !empty($image['filename']) ? $image['filename'] : null
                ];
                $model->setAttributes($formData, false);

                if($model->saveMouDetails()){
                    Yii::$app->session->addFlash('sign', 'Signature uploaded');
                    return $this->redirect(['/recruiter/mou']);
                }
            } else {
                $base64_image = $_POST['signature'];
                $path = Yii::getAlias('@webroot/uploads/signature/');
                $image_name = 'sign_'.time().'.png';
                $file = file_put_contents($path.$image_name, file_get_contents($base64_image));
    
                if($file){                
                    $formData = [
                        'recruiter_id' => $recruiter_id,
                        'reference_id' => $model->generateRefNo(),
                        'signature' => $image_name
                    ];
                    $model->setAttributes($formData, false);
    
                    if($model->saveMouDetails()){
                        Yii::$app->session->addFlash('sign', 'Signature uploaded');
                        
                         return $this->redirect(['/recruiter/mou']);
                    }
                }
            }
        }
        return $this->render('mou', [
            'model' => $model, 
            'modelMou' => $modelMou,
            'recruiter' => $recruiter
        ]);
    }

    public function actionGeneratePdf() {
        $modelForm = new MouForm();
        $recruiter_id = Yii::$app->user->identity->recruiter->id;

        $model = MouDetail::findOne(['recruiter_id' => $recruiter_id]);
        $recruiter = Recruiters::findOne(['id' => $recruiter_id]);

        $content = $this->renderPartial('_certificateView', ['model' => $model, 'recruiter' => $recruiter]);
        $path = Yii::getAlias('@webroot/uploads/files/');
        $filename = 'mou_' . $recruiter->owner_first_name . $recruiter_id . '.pdf';
        
        $pdf = Yii::$app->pdf; // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        $mpdf->SetHeader('Kartik Header'); // call methods or set any properties
        $mpdf->WriteHtml($content); // call mpdf write html
        $mpdf->Output($path.$filename, 'F'); // call the mpdf api output as needed

        if(file_exists($path.$filename)){
            Yii::$app->db->createCommand()
                ->update('mou_detail', [
                    'mou_agreement_file' => $filename
                ], 
                "recruiter_id = $recruiter_id")
            ->execute();
            Yii::$app->session->addFlash('success_msg', 'File saved!');
        } else {
            Yii::$app->session->addFlash('error_msg', 'Error to saving file!');            
        }
        return $this->redirect(['/recruiter/mou']);         

        /*$pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => Yii::getAlias('@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css'),
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'BUSINESS TIE UP AGREEMENT'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['BUSINESS TIE UP AGREEMENT'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();*/
    }

}
