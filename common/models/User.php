<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
use common\models\Users;
use yii\helpers\Url;
use yii\base\Event;
use frontend\models\ForStudents;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $type
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const TYPE_USER_STUDENT=2;
    const TYPE_USER_RECRUITER=1;
    const TYPE_USER_SCHOOL=0;
    const TYPE_USER_ADMIN=3;
    const TYPE_USER_ADMIN_moderator=4; //admin
    const TYPE_USER_ADMIN_rm=5;

    public $profile_pic;

    public $confirm_password;
    public $password;

    const TYPE_ADMINISTRATOR=3;
    const TYPE_SUPPORT_TEAM=5;
    const TYPE_MANAGEMENT_TEAM=4; //admin
    const TYPE_CONTENT_MANAGEMENT_TEAM=6;


    public static function optionType(){
        return [
            //'3'=>Yii::t('app', 'Super admin'),
            '5'=>Yii::t('app', 'RM'),
            '4'=>Yii::t('app', 'Moderate admin'),
            '6'=>Yii::t('app', 'Application Team'),
            '7'=>Yii::t('app', 'SEO Team'),
        ];
    }

    public static function roleOption(){
        $roles=\common\models\Roles::find()->all();
        return $roles;
    }
    





    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            [['id', 'type', 'updated_at'], 'integer'],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['profile_pic'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpeg, jpg, png'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['username','required'],
            [['email','confirm_password'], 'string', 'max' => 255],
             ['password', 'compare', 'compareAttribute'=>'confirm_password'],
            ['email', 'email'],
            [['created_date'], 'safe'],
            [
                'email', 'unique',
                'targetClass' => '\common\models\User',         
                'message' => 'This email address has already been taken.'
            ]
        ];
    }

    public static function optsStatus(){

        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Enable'),
            self::STATUS_INACTIVE => Yii::t('app', 'Disable'),                 
        ];

    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getRecruiter(){
		
		return $this->hasOne(\common\models\Recruiters::className(), ['user_id' => 'id']);

	}

    public function upload_profile_pic() {  
        $upload_dir = Yii::getAlias('@webroot').'/uploads/profile/';
        $this->profile_pic = UploadedFile::getInstanceByName('profile_pic');

        
        if ($this->profile_pic) { 
            $filename = $this->profile_pic->baseName.'.'.$this->profile_pic->extension;    
            if($this->profile_pic->saveAs($upload_dir . $filename)){                
                return $this->profile_pic->name;
            }
            else{
                return false;
            }            
        }         
    }

    public static function get_profile_pic(){
        $userid = Yii::$app->user->identity->id;
        $upload_dir = Yii::getAlias('@webroot').'/uploads/profile/';
        $user = static::findOne(['id' => $userid ]);

        $filename = $user->getAttribute('profile_pic');

        if(!file_exists($upload_dir.$filename)){
            return false;
        }
        
        //return Url::base(true).'/uploads/profile/'.$user->getAttribute('profile_pic');        
        return $user->getAttribute('profile_pic');        
    }
    public function getSchool(){
		
		return $this->hasOne(\common\models\School::className(), ['user_id' => 'id']);

	}
}

/* Event::on(User::className(), User::EVENT_AFTER_INSERT, function ($event) {
    $user_id = $event->sender->id;

    $student = new ForStudents();
    $student->user_id = $user_id;
    $student->save(false); 
 }); */

