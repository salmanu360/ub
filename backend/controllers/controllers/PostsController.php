<?php

namespace backend\controllers;
use Yii;
use common\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use common\models\Posts;
/**
/**
* This is the class for controller "PostsController".
*/
class PostsController extends \backend\controllers\base\PostsController
{

    // public function beforeAction($action)
    // {
    //     if(\Yii::$app->user->isGuest && $action->id !='login'){
               
    //          \Yii::$app->response->redirect(['site/login']);
    //           return false;
    //        //something code right here if user valided
    //     }

    //     return true;
    // }

   
public function actionCreate()
{
$model = new Posts;

try {
if ($model->load($_POST)) {

    if ($model->load(Yii::$app->request->post())) {
        $modelUploadForm = new UploadForm();
        $modelUploadForm->image = UploadedFile::getInstance($model, 'image');
        if(!empty($modelUploadForm->image->extension)){
            $image_name=uniqid() . '.' . $modelUploadForm->image->extension;
            $model->image =  $image_name;
            $modelUploadForm->image->saveAs('uploads/' . $image_name);
        }

         if(!empty($_POST['Posts']['blog_tags'])){
            $model->blog_tag=implode(',',$_POST['Posts']['blog_tags']);
        }

        $model->save(false);
         echo("<script>location.href = 'https://universitybureau.com/backend/web/posts/view?id=$model->id';</script>");
    }
        echo("<script>location.href = 'https://universitybureau.com/backend/web/posts/view?id=$model->id';</script>");
} elseif (!\Yii::$app->request->isPost) {
        $model->load($_GET);
}
} catch (\Exception $e) {
   // throw $e;
    $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
    $model->addError('_exception', $msg);
}
    return $this->render('create', ['model' => $model]);
}


public function actionUpdate($id)
{

   
$model =  Posts::findOne($id);
$model1 =  Posts::findOne($id);
try{

if(!empty($_POST)){
 $model->load($_POST);

if(!empty(UploadedFile::getInstance($model, 'image'))){ 
  
$modelUploadForm = new UploadForm();
$modelUploadForm->image = UploadedFile::getInstance($model, 'image');

    if(!empty($modelUploadForm->image->extension)){
        $image_name=uniqid() . '.' . $modelUploadForm->image->extension;
        $model->image =  $image_name;
        $modelUploadForm->image->saveAs('uploads/' . $image_name);
    }else{
        $model->image=$model1->image;
    }
}else{
    $model->image=$model1->image;
}
 if(!empty($_POST['Posts']['blog_tags'])){
            $model->blog_tag=implode(',',$_POST['Posts']['blog_tags']);
        }
$model->save(false);
 echo("<script>location.href = 'https://universitybureau.com/backend/web/posts/view?id=$model->id';</script>");
}else{
return $this->render('update', [
'model' => $model,
]);
}

}catch(\Exception $e){
    throw $e;
    die();

}



}

 // public function actionUpdate($id){
    
 //    $model = Posts::findOne($id);
 //    var_dump($model);
 // }

}
