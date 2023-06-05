<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_education".
 *
 * @property int $id
 * @property int $student_id
 * @property string $country_of_education
 * @property string $highest_level_education
 * @property string $grading_scheme
 * @property int $grade_scale
 * @property string $grade_average
 * @property int $graduated_recent_school
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $created_by
 * @property int|null $updated_by
 */
class StudentEducation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $student_id;
    public static function tableName()
    {
        return 'student_education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'country_of_education', 'highest_level_education', 'grading_scheme', 'grade_scale', 'grade_average', 'graduated_recent_school', 'created_at', 'created_by'], 'required'],
            [['student_id', 'grade_scale', 'graduated_recent_school', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['country_of_education', 'highest_level_education', 'grading_scheme', 'grade_average'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'country_of_education' => 'Country Of Education',
            'highest_level_education' => 'Highest Level Education',
            'grading_scheme' => 'Grading Scheme',
            'grade_scale' => 'Grade Scale',
            'grade_average' => 'Grade Average',
            'graduated_recent_school' => 'Graduated Recent School',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
