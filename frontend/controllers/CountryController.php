<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\StudyApply;
use Yii;
use yii\helpers\Url;
class CountryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'home-layout';
        return $this->render('index');
    }


    public function actionStudyInUnitedKingdom()
    {
        // echo '<pre>';print_r($_POSt);die;
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
             $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In United Kingdom')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
             return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInUnitedKingdom');
    }



    public function actionStudyInCanada()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Canada')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInCanada');
    }
    
    
    public function actionStudycanadashortform()
    {
        $model = new \common\models\GetInTouchCountry();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
                ->setFrom('noreply@universitybureau.com')
                ->setTo('student@universitybureau.com')
                //->setTo('salman.u360@gmail.com')
                ->setSubject('New Apply throgh banner form')
                ->setHtmlBody('
                    <p>Name: '.$model->name.'</p>
                    <p>Email: '.$model->email.'</p>
                    <p>Phone: '.$model->phone.'</p>
                    <p>Study Country: '.$model->study_country.'</p>
                    
                    ')
            ->send();
                return $this->render('/thank/country_thanks');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('studyInCanada');
    }
/* 
    public function actionStudycanada()
    {
        
        $this->layout = 'home-layout';
       
        return $this->render('studyInCanada');
    } */

    


   /*  public function actionStudyInAustralia()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInAustralia');
    } */


    public function actionStudyInAustralia()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Australia')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInAustralia');
    }

     /* public function actionStudyInSwitzerland()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInSwitzerland');
    } */


    public function actionStudyInSwitzerland()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Switzerland')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInSwitzerland');
    }

     

    /*  public function actionStudyInIreland()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInIreland');
    } */

    /* public function actionStudyInUnitedStateOfAmerica()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInUnitedStateOfAmerica');
    } */

    public function actionStudyInIreland()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Ireland')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInIreland');
    }


    public function actionStudyInUnitedStateOfAmerica()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In America')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInUnitedStateOfAmerica');
    }

    /*  public function actionStudyInFrance()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInFrance');
    } */


    public function actionStudyInFrance()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In France')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInFrance');
    }



    public function actionStudyInGermany()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Germany')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInGermany');
    }

    /* public function actionStudyInGermany()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInGermany');
    } */
    

    public function actionStudyInItaly()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Itlay')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInItlay');
    }
    /* public function actionStudyInItaly()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInItlay');
    } */
    


    public function actionStudyInLatvia()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Latvia')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInLatvia');
    }
    /* public function actionStudyInLatvia()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInLatvia');
    } */


    public function actionStudyInEurope()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Europe')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInEurope');
    }
    
    /* public function actionStudyInEurope()
    {
        $this->layout = 'home-layout';
       
        return $this->render('studyInEurope');
    } */

    public function actionStudyInGreece()
    {
        
        $this->layout = 'home-layout';
        $model= new StudyApply;
        if(Yii::$app->request->post('AppliedCouncilStudent')){
            yii::$app->request->post('AddBooks');
            $data=Yii::$app->request->post('AppliedCouncilStudent');
            $model->name=$data['name'];
            $model->email=$data['email'];
            $model->phone=$data['phone'];
            $model->state=$data['state'];
            $model->zip_code=$data['zip_code'];
            $model->college_id=$data['college_id'];
            $model->additional_message=$data['additional_message'];
            $model->created_at=date('Y-m-d');
            $model->save(false);
            $mail = Yii::$app->mailer->compose('@frontend/mail/recinvitation')
            ->setFrom('noreply@universitybureau.com')
            ->setTo('student@universitybureau.com')
            ->setSubject('New Apply For study In Europe')
            ->setHtmlBody('
            <p>Name: '.$model->name.'</p>
            <p>Email: '.$model->email.'</p>
            <p>Phone: '.$model->phone.'</p>
            <p>State: '.$model->state.'</p>
            <p>Zip Code: '.$model->zip_code.'</p>
            <p>Message: '.$model->additional_message.'</p>
            <p>Date: '.$model->created_at.'</p>
            ')
            ->send();
            return $this->render('/thank/country_thanks');
        }
       
        return $this->render('studyInGreece');
    }
    
    public function actionCollegeCanada()
    {
        return $this->render('collegeCanada');
    }

    public function actionCollegeUnitedKingdom()
    {
        return $this->render('collegeUnitedKingdom');
    }

    public function actionCollegeAustralia()
    {
        return $this->render('collegeAustralia');
    }

    public function actionCollegeEurope()
    {
        return $this->render('collegeEurope');
    }

    public function actionCollegeUsa()
    {
        return $this->render('collegeUsa');
    }

    public function actionCollegeNewZeland()
    {
        return $this->render('collegeNewZeland');
    }

}