<?php
namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use \common\models\User;
use \common\models\School;
use yii\helpers\ArrayHelper;
/**
 * This is the base-model class for table "customer".
 * @property integer $confirm_password
 * @property integer $password
 * @property string $name
 * @property string $cont_fname
 * @property string $cont_last_name
 * @property string $phone_number
 * @property string $cont_email
 * @property string $cont_title
 */


class SchoolForm extends \yii\base\Model
{
 

    public  $confirm_password;
    public $password;
    public $name,$cont_fname,$cont_last_name,$phone_number,$cont_email,$cont_title;

     

  /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'cont_email','name', 'cont_last_name', 'phone_number','cont_title','cont_fname'], 'required'], 
            [['phone_number'], 'string', 'max' => 30],
          //[['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\State::className(), 'targetAttribute' => ['state_id' => 'id']],
            //[['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            ['cont_email','cont_email'],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'skipOnEmpty' => false],
            [['cont_email'], 'unique', 'targetClass'=> User::className(), 'targetAttribute'=>'email', 'filter'=> function($query){           
                if(!$this->isNewRecord){
                        
                    return $query->andWhere(['not',['id'=> $this->school->user->id]]);
                }
            }],
        ];
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }




    /**
     * @inheritdoc
     * @return \common\models\query\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SchoolQuery(get_called_class());
    }


// save customer details 
    public function save(){
        if(!$this->validate()){     
            return false;
        }
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if($this->isNewRecord|| empty($this->customer)){
                $customer=new Customer;
            }else{
                $customer=$this->customer;
            }
            $customer->attributes=$this->attributes;  
            if(empty($customer->user)){
                    $user = new User(); 
                    $user->username =  $this->contact_email;
                    $user->email =  $this->contact_email;
                    $user->password =  $this->password;
                    $user->type =  USER::TYPE_USER_SCHOOL;
                    $user->auth_token=uniqid();
                    $user->status=USER::STATUS_DISABLE;
                    if($user->create()){
                        $customer->user_id=$user->id;
                    }else{
                        $user_errors = $user->errors;         
                        $this->addErrors($user_errors);
                        return false;
                    }
                }else{            
                    $customer->user->type =  USER::TYPE_USER_CUSTOMER;
                    if($this->email !==  $customer->user->email ){
                        $customer->user->username=$this->email;
                        $customer->user->email=$this->email;    
                    } 
                    if(!empty($_POST['CustomerForm']['confirm_password'])){
                        if(empty($_POST['CustomerForm']['password'])){
                            $customer->addError('password',\Yii::t('occ','Password can not Blank'));
                        }
                    }      
                    if(!empty($_POST['CustomerForm']['password'])){
                        if(empty($_POST['CustomerForm']['confirm_password'])){
                            $this->password=$_POST['CustomerForm']['password'];
                            $customer->addError('confirm_password',\Yii::t('occ','Confirm Password can not Blank'));
                        }
                        if($_POST['CustomerForm']['password']!== $_POST['CustomerForm']['confirm_password']){
                            //$this->password=$_POST['CustomerForm']['password'];
                            $customer->addError('confirm_password',\Yii::t('occ','Confirm Password must be equal to password'));
                        }
                        $customer->user->setPassword($_POST['CustomerForm']['password']);
                        $customer->user->generateAuthKey();
                        // $customer->user->username=$this->email;
                    }
                    $customer->user->save(false);
            }
            if(!$customer->hasErrors() && $customer->save()){
                if($this->isNewRecord|| empty($this->customer)){
                   $this->sendAuthenticateEmail($user);
                }
                    $this->id=$customer->id;
                    $transaction->commit();
                    return true;
            }else{            
                $this->addErrors($customer->errors);
                $transaction->rollBack();
                return false;
            }
        } catch (\Exception $e) {
             throw $e;
            $this->addError('', $e->getMessage());
            $transaction->rollBack();
            return false;
         }  
    }

  

    // check if record is new or not 
    public function getIsNewRecord(){    
        return empty($this->id);
    }

    public function attributeLabels()
    {
     return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                'created_at' => Yii::t('occ', 'Creation Date'),
                'name' => "School Name",
                'cont_fname'=> "Contact First Name",
                'cont_last_name' => "Contact Last Name",
                'phone_number' => "Phone Number",
                'cont_email' => "contact Email",
                'password'=>'Password',
                'confirm_password'=>'Confirm  Password'
            ]
            );
    }

//load customer data
    public function load_customer($id){
        // var_dump($id);
         if(!empty($id)){
             $this->id=$id;
         }else{
             return false;
         }
         $this->school =  School::findOne($id);
            if(empty($this->school)){
                unset($this->id);
                return false;
            }
        $this->attributes=$this->school->attributes;
            if(empty($this->school->user)){
                return false;        
            }
        $this->contact_email=$this->school->user->email;
    }

 

   

   
}