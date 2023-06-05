<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model{
  
    public $image;
    public $name;
    public $comp_logo;
    public $file;
    public $ten_certificate;

    public function rules(){
        return array();
    }
    
    public function upload(){
        if(!empty($this->imageFile->baseName)){
            try{
                $file= uniqid().'.'.$this->imageFile->extension;
                $this->image->saveAs( \Yii::$app->request->baseUrl."/"."upload/".$file);
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
