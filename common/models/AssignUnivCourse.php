<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assign_univ_course".
 *
 * @property int $id
 * @property int $student_id
 * @property int $college_id
 * @property string $course_id
 * @property int $created_by
 * @property string $created_date
 * @property string $intake
 */
class AssignUnivCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $stu_id;
    public static function tableName()
    {
        return 'assign_univ_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'college_id', 'course_id', 'created_by', 'intake'], 'required'],
            [['student_id', 'college_id', 'created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['intake'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Unique ID',
            'student_id' => 'Student',
            'college_id' => 'College',
            'course_id' => 'Course',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'intake' => 'Intake',
        ];
    }
}
