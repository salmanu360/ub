<?php
namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use common\models\MouDetail;

class MouForm extends Model
{
    public $id;
    public $recruiter_id;
    public $reference_id;
    public $signature; 

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recruiter_id'], 'required'],
            [['recruiter_id'], 'integer'],
            [['reference_id', 'signature_image'], 'string', 'max' => 255],
            [['signature'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpeg, jpg, png', 'maxFiles' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recruiter_id' => 'Recruiter ID',
            'reference_id' => 'Reference ID',
            'signature_image' => 'Signature Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function generateRefNo($length = 10){
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
        //return uniqid().mt_rand();	
		//return $prefix.rand();
	}

    public function saveMouDetails(){
        $recruiter_id = Yii::$app->user->identity->recruiter->id;
        $mouModel = new MouDetail();

        $mouModel->recruiter_id = $this->recruiter_id;
        $mouModel->reference_id = $this->reference_id;
        $mouModel->signature_image = $this->signature;

        if(!$mouModel->validate()){
            $error = $mouModel->getErrors();
            $this->addErrors($error);
            return false;
        }
        $moudetail = MouDetail::find()->where(['recruiter_id' => $recruiter_id])->one();
        
        $existing = MouDetail::find()->where(['recruiter_id' => $recruiter_id])->exists();
        if(!$existing){
            $mouModel->save();
        } else {
            $path = Yii::getAlias('@webroot/uploads/signature/');
            /*if(file_exists($path.$moudetail->signature_image)){
                unlink($path.$moudetail->signature_image);
            }*/

            \Yii::$app->db->createCommand()->update('mou_detail', 
                [
                    'signature_image' => $mouModel->signature_image
                ], 
                'recruiter_id = '.$mouModel->recruiter_id)
            ->execute();

        }
        return true;        
    }

    public function uploadSignatureImage($filename, $tmpname) {
        $output = [];
        $upload_dir = Yii::getAlias('@webroot/uploads/signature/');        
        
        if(!empty($filename)){
            $target_file = $upload_dir . basename($filename);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            $check = getimagesize($tmpname);

            
            if($check === false) {
                return $output = [
                    'status' => false,
                    'message' => "Invalid Image"
                ];
            } 
           
             if (file_exists($target_file)) {                
                return $output = [
                    'status' => false,
                    'message' => "Sorry, file already exists."
                ];
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {               
                return $output = [
                    'status' => false,
                    'message' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
                ];
            }

            if (move_uploaded_file($tmpname, $target_file)) {
                return $output = [
                    'status' => true,
                    'message' => "Hurray, Image uploaded successfully.",
                    'filename' => $filename
                ];
            } else {
                return $output = [
                    'status' => false,
                    'message' => "Sorry, Image can not be uploaded."
                ];
            }
        } else {
            return $output = [
                'status' => false,
                'message' => "Sorry, Image not found."
            ];
        } 
    }
}
