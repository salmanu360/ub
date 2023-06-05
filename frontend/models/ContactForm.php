<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
      public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email'], 'required'],
            [['phone', 'subject', 'body'], 'string'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfMe2EfAAAAAA20OxxeOOKc-i3GCF9o9ZqsCMRj'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' =>'',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
      //die('test');
      // var_dump(Yii::$app->params['senderEmail']);
      // var_dump(Yii::$app->params['senderName']);
               
        

           $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo($this->email)
            ->setSubject('Test Email UB')
            //->setTextBody('Plain text content. YII2 Application')
            //->setHtmlBody('<b>This is another test for HTML content <i>University bureau </i></b>')
            ->send();

              Yii::$app->mailer->compose('@frontend/mail/recadmin',['model'=>$this])
            ->setFrom('noreply@universitybureau.com')
            ->setTo("noreply@universitybureau.com")
            // ->setTo("noreply@universitybureau.com")
            ->setSubject('Test Email UB')
            //->setTextBody('Plain text content. YII2 Application')
            //->setHtmlBody('<b>This is another test for HTML content <i>University bureau </i></b>')
            ->send();



          if(  $mail){
            return true;
          }
         // die();
    }

  

    //     return Yii::$app->mailer->compose()
    //         ->setTo($email)
    //         ->setFrom(['keshavchauhan5445@gmail.com' => Yii::$app->params['senderName']])
    //         ->setReplyTo([$this->email => $this->name])
    //         ->setSubject($this->subject)
    //         ->setTextBody($this->body)
    //         ->send();
    // }
}
