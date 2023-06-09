<?php

namespace common\models;

use Yii;
use \common\models\base\Country as BaseCountry;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "country".
 */
class Country extends BaseCountry
{

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
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }

    public static function optsCountry() 
    { 
        return ArrayHelper::map(Country ::find()->all(), 'id', 'name');
        // return [ 
        //     self::VEHICLE_TYPE_CAR => Yii::t('occ', 'Car'), 
        //     self::VEHICLE_TYPE_BIKE => Yii::t('occ', 'Bike'), 
        //     self::VEHICLE_TYPE_TRUCK => Yii::t('occ', 'Truck'), 
        //     self::VEHICLE_TYPE_CARAVAN => Yii::t('occ', 'Caravan'), 
        // ]; 
    }

    public static function getcoursename() 
    { 
        $courses=array(
            'Accounting & Finance'=>'Accounting & Finance',
            'Aerospace and Manufacturing Engineering'=>'Aerospace and Manufacturing Engineering',
            'Agriculture,Forestry and Food'=>'Agriculture,Forestry and Food',
            'American Studies'=>'American Studies',
            'Anatomy and Physiology'=>'Anatomy and Physiology',
            'Anthropology'=>'Anthropology',
            'Architecture'=>'Architecture',
            'Art'=>'Art',
            'Art History'=>'Art History',
            'Biosciences'=>'Biosciences',
            'Building and Town and Country Planning'=>'Building and Town and Country Planning',
            'Business and Management'=>'Business and Management',
            'Chemical Engineering'=>'Chemical Engineering',
            'Chemistry'=>'Chemistry',
            'Civil Engineering'=>'Civil Engineering',
            'Classics and Ancient History'=>'Classics and Ancient History',
            'Computer Science'=>'Computer Science',
            'Criminology'=>'Criminology',
            'Dentistry'=>'Dentistry',
            'Criminology'=>'Criminology',
            'Design and Crafts'=>'Design and Crafts',
            'Development Studies'=>'Development Studies',
            'Drama and Dance'=>'Drama and Dance',
            'Earth and Marine Science'=>'Earth and Marine Science',
            'Economics'=>'Economics',
            'Education'=>'Education',
            'Electrical Engineering'=>'Electrical Engineering',
            'English and Creative Writing'=>'English and Creative Writing',
            'English Literature'=>'English Literature',
            'Fashion and Textiles'=>'Fashion and Textiles',
            'Film Production'=>'Film Production',
            'Food Science'=>'Food Science',
            'Forensic Science and Archaeology'=>'Forensic Science and Archaeology',
            'General Engineering'=>'General Engineering',
            'Geography and Environmental Studies'=>'Geography and Environmental Studies',
            'Health'=>'Health',
            'History'=>'History',
            'Hospitality, Event Management and Tourism'=>'Hospitality, Event Management and Tourism',
            'Hotel Management'=>'Hotel Management',
            'International Relations'=>'International Relations',
            'Journalism, Publishing and Public Relations'=>'Journalism, Publishing and Public Relations',
            'Law'=>'Law',
            'Life Sciences'=>'Life Sciences',
            'Linguistics'=>'Linguistics',
            'Marketing'=>'Marketing',
            'Material Engineering'=>'Material Engineering',
            'Mathematics'=>'Mathematics',
            'MBA'=>'MBA',
            'Mechanical Engineering'=>'Mechanical Engineering',
            'Media Studies'=>'Media Studies',
            'Medicine'=>'Medicine',
            'Music'=>'Music',
            'Nursing and Midwifery'=>'Nursing and Midwifery',
            'Other'=>'Other',
            'Pharmacy'=>'Pharmacy',
            'Philosophy'=>'Philosophy',
            'Physics'=>'Physics',
            'Physiotherapy'=>'Physiotherapy',
            'Politics'=>'Politics',
            'Psychology'=>'Psychology',
            'Religious Studies'=>'Religious Studies',
            'Social Policy and Administration'=>'Social Policy and Administration',
            'Social Work'=>'Social Work',
            'Sociology'=>'Sociology',
            'Social Science'=>'Social Science',
            'Sports Science'=>'Sports Science',
            'Supply Chain and Logistics'=>'Supply Chain and Logistics',
            'Politics'=>'Politics',
            'Veterinary Science'=>'Veterinary Science',
        );
        return $courses;
    }


    public static function getprogram() 
    { 
        $courses=array(
            'undergraduate'=>'undergraduate',
            'postgraduate'=>'postgraduate',
            'diploma'=>'diploma',
            'UG'=>'UG',
            'PG'=>'PG',
        );
        return $courses;
    }
    

    public static function getCountry($id){
        $country =  \common\models\Country::find()->where(['id' => $id])->asArray()->one();
        return $country['name'];
    }

    public static function getCourses(){
        return ArrayHelper::map(\common\models\Course ::find()->all(), 'name', 'name');
    }

    
}
