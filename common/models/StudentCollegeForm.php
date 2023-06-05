<?php

namespace common\models;

use Yii;
use yii\base\Model;
use \common\models\base\StudentCollegeAttended as BaseStudentCollegeAttended;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;

/**
 * This is the model class for table "student_school_attended".
 */
class StudentCollegeForm extends Model
{

    public $id;
    public $student_id;
    public $institution_country;
    public $institution_name;
    public $education_level;
    public $primary_language;
    public $attended_institution_from;
    public $attended_institution_to;
    public $degree_name;
    public $graduated_from_institute;
    public $graduation_date;
    public $physical_certificate;
    public $address;
    public $city;
    public $province;
    public $zip_code;
    
   /*  public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    } */

    public function rules()
    {
        return [
            [['student_id', 'institution_country', 'institution_name', 'education_level', 'primary_language', 'attended_institution_from', 'attended_institution_to', 'graduated_from_institute', 'graduation_date', 'address', 'city'], 'required'],
            [['student_id', 'institution_country', 'graduated_from_institute', 'physical_certificate'], 'integer'],
            [['attended_institution_from', 'attended_institution_to', 'graduation_date'], 'safe'],
            [['address'], 'string'],
            [['institution_name', 'education_level', 'degree_name'], 'string', 'max' => 255],
            [['primary_language', 'city', 'province'], 'string', 'max' => 100],
            [['zip_code'], 'string', 'max' => 10],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Student::className(), 'targetAttribute' => ['student_id' => 'ID']]
        ];
    }

    public function getIsNewRecord(){
        return (empty($this->id) || empty($this->student_id));
    }

    public function loadCollegeAttended($id){
        
        $college = $this->findModel($id);         
        
        if(empty($college)){
            return false;
        }
        
        $student = Student::find()->andWhere(['id' => $id])->one();

        $this->id = $student->ID;
        $this->student_id = $college->student_id;
        $this->institution_country = $college->institution_country;
        $this->institution_name = $college->institution_name;
        $this->education_level = $college->education_level;
        $this->primary_language = $college->primary_language;
        $this->attended_institution_from = $college->attended_institution_from;
        $this->attended_institution_to = $college->attended_institution_to;
        $this->degree_name = $college->degree_name;
        $this->graduated_from_institute = $college->graduated_from_institute;
        $this->graduation_date = $college->graduation_date;
        $this->physical_certificate = $college->physical_certificate;
        $this->address = $college->address;
        $this->city = $college->city;
        $this->province = $college->province;
        $this->zip_code = $college->zip_code;

        return $this;
    }


    public function saveStudentCollege($id){
        /* if(!$this->validate()){
            return false;
        }  */

        if(!$this->getIsNewRecord()){
            $college = $this->findModel($id);        
            $college->setAttributes($this->attributes);
        }
        else{ 
            $college = new StudentCollegeAttended;
            $college->setAttributes($this->attributes); 
            $college->student_id = $id; 
        }
        
        try  {
            if(!$college->save(false)){
                $this->addErrors($college->errors);
                return false;
            } else {
                return true;
            } 
        } catch (\Exception $e) { 
            return false;
        }
    }

    protected function findModel($id) {
        if (($model = StudentCollegeAttended::find()->andWhere(['student_id' => $id])->one()) !== null) {
            return $model;
        } else {
            return false;
            //throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
