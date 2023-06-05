<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\ForStudents;
use frontend\models\SmsOtp;

/**
 * Signup form
 */
class SignupForm extends Model
{
    //public $username;
    public $email;
    public $password;
    public $mobile;
    public $first_name;
    public $last_name;
    public $type;
    public $confirm_password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // ['username', 'trim'],
            // ['username', 'required'],
            // ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            // ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['mobile', 'trim'],
            ['mobile', 'required'],

            ['first_name', 'trim'],
            ['first_name', 'required'],

            ['last_name', 'trim'],
            ['last_name', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['confirm_password', 'required'],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            [['email'], 'unique',
                'targetClass' => '\common\models\User', 
                'targetAttribute' => 'email', 
                'message'=>'This Email is already in use'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $sms = new SmsOtp();
        
        $user = new User();
        $student= new ForStudents();
        $student->scenario = ForStudents::SCENARIO_STUDENT_REGISTER;

        $user->username = $this->email;
        $user->email = $this->email;
        $user->type = User::TYPE_USER_STUDENT;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();
        $this->sendEmail($user);
      
        $student->user_id = $user->id;
        $student->first_name = $this->first_name;
        $student->last_name = $this->last_name;
        $student->phone_no = $this->mobile;

        /* send otp for verification */
        $userModel = new User();
        //$userModel->sendOtp($student->phone_no, User::USER_TYPE_STUDENT, $user->id);      
        
        if($student->save(false)){
             $notification=new \common\models\Notification();
            $notification->created_by='New Student';
            $notification->created_at=date('Y-m-d');
            $notification->module='Student Register';
            $notification->name=$student->first_name;
            $notification->save(false);

            $History=new \common\models\History();
            $History->module='Student ('.$student->first_name.')';
            $History->action='New';
            $History->created_at=date('Y-m-d');
            $History->created_by='New Student';
            $History->save(false);
            return true;
        }       
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->name . ' Email Verify'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
?>
