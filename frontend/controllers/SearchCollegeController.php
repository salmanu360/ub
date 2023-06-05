<?php

namespace frontend\controllers;
// use yii\filters\VerbFilter;

 use Yii;
 use yii\base\Model;
 use common\models\School;
 use backend\models\SchoolSearch;
 use frontend\models\CourseSearch;
// use yii\web\Controller;
 use yii\web\HttpException;
 use yii\helpers\Url;
 use common\models\Review;
 use common\models\AppliedCouncilStudent;
// use yii\filters\AccessControl;
// use dmstr\bootstrap\Tabs;

use kartik\widgets\StarRating;


class SearchCollegeController extends \yii\web\Controller{
    
     
   
     public function actionIndex() {        
        $this->layout = 'home-layout';

        $searchModel  = new SchoolSearch;
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->pagination->pageSize=12;

        $searchCourseModel  = new CourseSearch;
        $dataProviderCourse = $searchCourseModel->search($_GET);
        $dataProviderCourse->pagination->pageSize = 12;    
         

         $councilStudent = new AppliedCouncilStudent;


          if ($councilStudent->load(Yii::$app->request->post()) && $councilStudent->modal()) {

            //die('going in this');
            Yii::$app->session->setFlash('success', 'Thank you for enquiry. Please check your inbox for verification email.');
           return $this->redirect(['search-college/index']);
        }
          //$dataCouncil = $councilStudent->search($_GET);


       /* Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;*/

        return $this->render('index', [
            // 'dataProvider' => $dataProvider,
            // 'searchModel' => $searchModel,


             'dataProvider' => $dataProvider,
            'dataProviderCourse' => $dataProviderCourse,
            'searchModel' => $searchModel,
            'searchCourseModel' => $searchCourseModel,
             'councilStudent' => $councilStudent,
             //'dataCouncil'   => $dataCouncil,
        ]);

       
    }



    public function actionDemo()
{
   
    $this->layout = 'home-layout';
    return $this->render('demo');
}


public function actionDetail()
{ 
    Yii::$app->session['__crudReturnUrl'] = Url::previous();
    Url::remember();
    
   // $this->layout = 'home-layout';
        $this->layout = 'home-layout';
        $slug=\Yii::$app->getRequest()->url;
        $slug=str_replace('/universitybureau/search-college/','',$slug);
        $slug=str_replace('/search-college/','',$slug);
        $model=School::find()->where(['slug'=> $slug])->one();

        $reviewModel = new Review();

        if(Yii::$app->request->isPost){
            $reviewModel->setAttribute('info_id', $model->id);
            // $reviewModel->setAttribute('type', 1);
            // $reviewModel->setAttribute('rating', 5);
           
            if( $reviewModel->load(Yii::$app->request->post()) ) {
                if($reviewModel->save(false)){
                    //return $this->redirect(Url::previous());
                    return $this->refresh();
                }
            }
           
        }

         $councilStudent = new AppliedCouncilStudent();


       






        return $this->render('detail',[
            'model' => $model,
            'reviewModel' => $reviewModel,

            'councilStudent' => $councilStudent,
        ]);

       
}

// public function actionView($id) {
//         $this->layout = 'inner';
        
//         \Yii::$app->session['__crudReturnUrl'] = Url::previous();
//         Url::remember();
//         Tabs::rememberActiveState();

//         return $this->render('view', [
//         'model' => $this->findModel($id),
//         ]);
//     }



}

?>