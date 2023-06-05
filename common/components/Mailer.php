<?php

namespace common\components;

use Yii;

class Mailer extends \yii\swiftmailer\Mailer
{
    /** @var string */
    public $appViewPath = '@app/mail';
    public $appHtmlLayout = 'layouts/html';
    //public $textLayout = 'layouts/text';

    /** @var string|array Default: `Yii::$app->params['adminEmail']` OR `no-reply@example.com` */
    public $sender;

    public $emailHeader = [];

    /**
     * @param string $to
     * @param string $subject
     * @param string $view
     * @param array  $params
     *
     * @return bool
     */
    public function sendEmail($to, $subject, $view, $params = [], $attachments  = [],$cc = [])
    {
     


        /** @var \yii\mail\BaseMailer $mailer */
        $mailer = Yii::$app->mailer;
        $mailer->viewPath = $this->appViewPath;
        $mailer->htmlLayout = $this->appHtmlLayout;
        //$mailer->textLayout = $this->textLayout;
        $mailer->getView()->theme = Yii::$app->view->theme;
        // if(!is_array($to)){
        //     $to = [$to];
        // }

        // if(!empty(Yii::$app->params['debug_email'])){
        //     $to[] = Yii::$app->params['debug_email'];
        // }


        // Yii::$app->params['emailHeader'] = $this->emailHeader;
     
    $mail = Yii::$app->mailer->compose($view)
            ->setFrom('noreply@universitybureau.com')
            ->setTo($to)
            ->setSubject($subject)
            //->setTextBody('Plain text content. YII2 Application')
            //->setHtmlBody('<b>This is another test for HTML content <i>University bureau </i></b>')
            ->send();

            if($mail){
                            echo "Send Successfully";
                        } else {
                            throw new Exception("Unable to send email for partner id");	
                        }    
                


        // $message = $mailer->compose($view, /*'text' => 'text/' . $view*/)
        //     ->setTo($to)
        //     ->setFrom([$this->sender=>'noreply@universitybureau.com'] )
        //     ->setSubject($subject);
        // if(!empty($cc)){
        //     $message->setCc($cc);
        // }    

        // if(!empty($attachments)){
        //     foreach ($attachments as $attachment) {
        //         $message->attach($attachment);
        //     }
        // }        

        // if( $message->send()){
        //     $mailer->getTransport()->stop();
        //     return true;    
        // }else{
        //     return false;
        // }
    }
}