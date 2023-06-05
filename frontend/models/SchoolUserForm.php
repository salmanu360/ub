<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;


/**
 * Signup form
 */
class SchoolUserForm extends Model
{
    //public $username;
    public $profile_pic;
    public $username;
    public $password;
    public $confirm_password; 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        
            ['username', 'trim'],
            ['username', 'required'],
            ['password', 'trim'],
            ['username', 'email'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['confirm_password', 'compare', 'compareAttribute'=>'password','skipOnEmpty' => false, 'message'=>"Passwords don't match" ],
            ['profile_pic','file'],


        ];
    }

 
}
?>
