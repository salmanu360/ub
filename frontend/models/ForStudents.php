<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\ForStudents as BaseForStudents;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "for_students".
 */
class ForStudents extends BaseForStudents
{
    const SCENARIO_STUDENT_REGISTER = 'student_register';
    const SCENARIO_STUDENT_PROFILE = 'student_profile';

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        $parent = parent::rules();

      /*   echo "<pre>";
        var_dump($parent);
        die(); */
        unset($parent[7][0][5]); //study_permit
        unset($parent[1][0][16]); //gre_writing_score
        unset($parent[1][0][23]); //gmat_writing_score
       // unset($parent[1][0][25]); //gmat_total_score
        
        return ArrayHelper::merge(
            $parent,
            [
                [['upload_document'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpeg, jpg, png, pdf, doc, docx', 'maxFiles' => 4],
                [['study_permit', 'gre_writing_score', 'gmat_writing_score'], 'safe'],
               // [['gmat_total_score'], 'integer', 'compare', 'operator'=>'<', 'compareValue' => 200, 'message' => 'ola' ],
            ]
        );
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_STUDENT_REGISTER] = ['user_id', 'first_name', 'last_name', 'phone_no'];
        $scenarios[self::SCENARIO_STUDENT_PROFILE] = ['username', 'email', 'password'];
        return $scenarios;
    }

    public function uploadDocuments()
    {
        $upload_dir = Yii::getAlias('@webroot').'/uploads/docs/';
         
        $model = ForStudents::find()->andWhere(['id' => $this->id])->one();
        
        $this->upload_document = UploadedFile::getInstances($this, 'upload_document');

        if(empty($this->upload_document)){
            return null;
        }
        
        //$file_string = '';
        $files = [];
        foreach ($this->upload_document as $file) {                
            $file->saveAs($upload_dir . $file->baseName . '.' . $file->extension);
            //$file_string .= $file->name . ',';
            $files[] = $file->name;
        }

        if(!empty($model->upload_document)){
            array_unshift($files, $model->upload_document);
        } 
        $file_string = implode(',', $files);
        //$files = rtrim($file_string, ',');        
        return $file_string;         
    }
    
}
