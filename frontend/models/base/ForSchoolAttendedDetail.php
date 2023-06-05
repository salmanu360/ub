<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\models\base;

use Yii;

/**
 * This is the base-model class for table "for_school_attended_detail".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $institution_country
 * @property string $institution_name
 * @property string $education_level
 * @property string $primary_language
 * @property string $attended_institution_from
 * @property string $attended_institution_to
 * @property string $degree_name
 * @property integer $graduated_from_institute
 * @property string $graduation_date
 * @property integer $physical_certificate
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $zip_code
 * @property string $aliasModel
 */
abstract class ForSchoolAttendedDetail extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'for_school_attended_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'institution_country', 'institution_name', 'education_level', 'primary_language', 'attended_institution_from', 'attended_institution_to', 'graduated_from_institute', 'graduation_date', 'address', 'city'], 'required'],
            [['student_id', 'institution_country', 'graduated_from_institute', 'physical_certificate'], 'integer'],
            [['attended_institution_from', 'attended_institution_to', 'graduation_date'], 'safe'],
            [['address'], 'string'],
            [['institution_name', 'education_level', 'degree_name'], 'string', 'max' => 255],
            [['primary_language', 'city', 'province'], 'string', 'max' => 100],
            [['zip_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'institution_country' => 'Institution Country',
            'institution_name' => 'Institution Name',
            'education_level' => 'Education Level',
            'primary_language' => 'Primary Language',
            'attended_institution_from' => 'Attended Institution From',
            'attended_institution_to' => 'Attended Institution To',
            'degree_name' => 'Degree Name',
            'graduated_from_institute' => 'Graduated From Institute',
            'graduation_date' => 'Graduation Date',
            'physical_certificate' => 'Physical Certificate',
            'address' => 'Address',
            'city' => 'City',
            'province' => 'Province',
            'zip_code' => 'Zip Code',
        ];
    }




}