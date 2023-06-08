<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\ApplyJobs;

/**
 * ContactForm is the model behind the contact form.
 */
class ApplyForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $experience;
    public $resume;



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name'], 'string', 'max' => 120],
            [['email'], 'string', 'max' => 65],
            [['phone'], 'string', 'max' => 15],
            [['experience'], 'string', 'max' => 20],
            [['resume'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'experience' => 'Experience',
            'resume' => 'Resume',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // public function saveData()
    // {
    //     $apply = new ApplyJobs();




    //     echo "<pre>";
    //     var_dump($apply);
    //     die();
    // }


    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }

    protected function findModel($id) {
        if (($model = ApplyJobs::find()->andWhere(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

}
