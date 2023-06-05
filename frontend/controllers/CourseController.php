<?php

namespace frontend\controllers;
use Yii;
use common\models\AppliedCouncilStudent;
use common\models\Course;
use common\models\School;
use common\models\Country;
//use frontend\models\CourseSearch;
/**
* This is the class for controller "CourseController".
*/
class CourseController extends \frontend\controllers\base\CourseController
{

	public function actionAdd($id){

  
       
        $cartFormModel = new AppliedCouncilStudent;
    
        
        if($_POST['type']==0){

             $course= new Course();
      
        $college = School::find()->where(['id'=>$id])->one();

        }else{
             $course=Course::find()->where(['id'=>$id])->one();
      
        $college = School::find()->where(['id'=>$course->college_id])->one();
        }

       


        if ($cartFormModel->load($_POST) && empty($cartFormModel->errors)) {
          //var_dump($_POST);
  
            $cartFormModel->save(false);


                $council = AppliedCouncilStudent::findOne(['id'=>$cartFormModel->id]);
                $country = Country::find()->where(['id'=>$council['country']])->one();
                
                $college = School::find()->where(['id'=>$council['college_id']])->asArray()->one();
                 
                $course = Course::find()->where(['id'=>$council['course_id']])->one();
               

                $data = [
                        'name' => $council['name'],
                        'email'=> $council['email'],
                        'phone'=> $council['phone'],
                        // 'country'=>$council['country'],
                        'country'=>$country['name'],

                        'state'=>$council['state'],
                        'city'=>$council['city'],
                        'zip_code'=>$council['zip_code'],
                        'additional'=>$council['additional_message'],
                        'course' =>$course['name'],
                        'college'=>$college['name'],

                ];


             $mail = Yii::$app->mailer->compose('@common/mail/council-student/council-student-invitation') 
                ->setFrom('noreply@universitybureau.com')
                ->setTo([$cartFormModel->email])
                ->setSubject('Congratulations...!! You have successfully registered for admission counseling.')
                //->setTextBody('Plain text content. YII2 Application')
                //->setHtmlBody('<b>This is another test for HTML content <i>University bureau </i></b>')
                ->send();              


                // if($mail){
                //     return $this->redirect(Yii::$app->request->referrer);
                // }


                 $mail1 = Yii::$app->mailer->compose('@common/mail/council-student/council-support-team', ['council' => $data]) 
                ->setFrom('noreply@universitybureau.com')
                ->setTo(['support@universitybureau.com'])//support@universitybureau.com
                ->setSubject('New Enquiry for Counciling')
                //->setTextBody('Plain text content. YII2 Application')
                //->setHtmlBody('<b>This is another test for HTML content <i>University bureau </i></b>')
                ->send();              


                if($mail1){
                    return $this->redirect(Yii::$app->request->referrer);
                }
        }
      
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('modal', [
                'councilStudent' => $cartFormModel,
                'course' => $course,
                'college'=>$college,
                'country'=>$country 
            ]);            
        }
        else{
          return $this->redirect(Yii::$app->request->referrer);
        }    
    }








  




    //public function actionCounsil(){


//       $model = new Course;


// if ($model->load($_POST) && $model->save() ) {

//      var_dump($model->attributes);
//      die();

//     }else{
//           return $this->renderAjax('modal', [

//             'councilStudent' => $model,

//         ]);

//     }

//   }





}
