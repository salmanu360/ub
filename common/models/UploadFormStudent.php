<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFormStudent extends Model{
  
    public $image;
    public $ten_certificate;
    public $twelve_certificate;
    public $passport;
    public $ielts;
    public $graduation_certificate;
    public $lor;
    public $moi;
    public $sop;
    public $diploma_certificate;
    public $master_certificate;
    public $work_experiance;
    public $other_certificate;
    public $updated_cv;

    public function rules(){
        return array();
    }
    
    public function upload(){
        if(!empty($this->imageFile->baseName)){
            try{
                $file= uniqid().'.'.$this->imageFile->extension;
                echo Yii::$app->request->baseUrl;die;
                $this->image->saveAs( \Yii::$app->request->baseUrl."/"."uploads/doc_student/".$file);
            }catch (\Exception $e) {
                 throw $e;
                 die();
            }
           
           

            return $file;
        }
        else {
            echo Yii::$app->request->baseUrl;die;
            return "";
        }
    }
}
