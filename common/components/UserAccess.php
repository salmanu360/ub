<?php
namespace common\components;
use common\models\User;

class UserAccess extends \yii\base\Component{
    // 5 => TYPE_SUPPORT_TEAM
    // 4 => TYPE_MANAGEMENT_TEAM
    // 6 => TYPE_CONTENT_MANAGEMENT_TEAM

    // give access to user view, update, delete
    public function getAccess() {
             return [
                User::TYPE_SUPPORT_TEAM => ['course'=>"{view}", 'lavel_education'=>"{view}",'grading_scheme'=>"{view}",'recruiters'=>"{view}",'school'=>"{view}",'marketing_method'=>"{view}"],
                User::TYPE_MANAGEMENT_TEAM =>['course'=>"{view} {update} {delete}", 'country'=>"{view} {update} {delete}",'states'=>"{view} {update} {delete}",'city'=>"{view} {update} {delete}",'lavel_education'=>"{view} {update} {delete}",'grading_scheme'=>"{view} {update} {delete}",'recruiters'=>"{view} {update} {approve} {disapprove}",'school'=>"{view} {update} {approve} {disapprove}",'marketing_method'=>"{view} {update} {delete}"],
                User::TYPE_CONTENT_MANAGEMENT_TEAM =>['course'=>"{view} {update} {delete}", 'country'=>"{view} {update} {delete}",'states'=>"{view} {update} {delete}",'city'=>"{view} {update} {delete}",'lavel_education'=>"{view} {update} {delete}",'grading_scheme'=>"{view} {update} {delete}",'marketing_method'=>"{view} {update} {delete}",'blog'=>"{view} {update} {delete}",'blog_category'=>"{view} {update} {delete}",'pages'=>"{view} {update} {delete}",'setting'=>"{view} {update} {delete}",'tags'=>"{view} {update} {delete}"]
             ];
      
    }
    
    // give Access to user for addition
    public function isShowAdd(){
        return [
                User::TYPE_SUPPORT_TEAM => ['course'=>1, 'lavel_education'=>0,'grading_scheme'=>0,'recruiters'=>0,'school'=>0,'marketing_method'=>0],
                User::TYPE_MANAGEMENT_TEAM =>['course'=>1, 'country'=>1,'states'=>1,'city'=>1,'lavel_education'=>1,'grading_scheme'=>1,'recruiters'=>1,'school'=>1,'marketing_method'=>1],
                User::TYPE_CONTENT_MANAGEMENT_TEAM =>['course'=>1, 'country'=>  1,'states'=>1,'city'=>1,'lavel_education'=>1,'grading_scheme'=>1,'marketing_method'=>1,'blog'=>1,'blog_category'=>1,'pages'=>1,'setting'=>1,'tags'=>1]
             ];  
    }

    //get exect access 
    public function getAccessModule($type,$label){
        $data= $this->getAccess();
       
        if(!empty( $data[$type][$label])){
        return $data[$type][$label];
        }else{
            return '';
        }
    }

     //get exect Add access 
     public function isShowAddModule( $type,$label){
        $data= $this->isShowAdd();
        if(!empty( $data[$type][$label])){
        return $data[$type][$label];
        }else{
            return '';
        }
    }  




}

?>