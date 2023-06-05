<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assign_student_recruiter".
 *
 * @property int $id
 * @property int $recruiter_id
 * @property int $student_id
 * @property int $user_id
 * @property string $date_created
 */
class AssignStudentRecruiter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_student_recruiter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recruiter_id', 'student_id', 'user_id'], 'required'],
            [['recruiter_id', 'student_id', 'user_id'], 'integer'],
            [['recruiter_id', 'student_id'], 'unique', 'targetAttribute' => ['recruiter_id', 'student_id']],
            [['date_created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recruiter_id' => 'Recruiter',
            'student_id' => 'Student',
            'user_id' => 'User',
            'date_created' => 'Date Created',
        ];
    }
}
