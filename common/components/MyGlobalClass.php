<?php
namespace common\components;
class MyGlobalClass extends \yii\base\Component{
    public function init() {

       parent::init();

       if(\Yii::$app->user->isGuest){
           //  header("Location:https://universitybureau.com/backend/web/site/login");
       }else{
       	  // var_dump(\Yii::$app->controller->action->id);
       	  // die();
       }
    }
}

?>