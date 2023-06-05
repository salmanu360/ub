<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFormBackend extends Model{
  
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
        $mainpath = Yii::getAlias('@webroot/');
        $convertPath = str_ireplace('/backend/web', '/frontend/web',$mainpath);
        if(!empty($this->imageFile->baseName)){
            try{
                $file= uniqid().'.'.$this->imageFile->extension;
                $mainroot=$convertPath.'uploads/'.$model->ten_certificate;
                $this->image->saveAs( $convertPath."uploads/".$file);
            }catch (\Exception $e) {
                 throw $e;
                 die();
            }
           
           

            return $file;
        }
        else {
            return "";
        }
    }
}
