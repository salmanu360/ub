<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recruiter_student_comment".
 *
 * @property int $id
 * @property int|null $student_id
 * @property int|null $recruiter_id
 * @property string $comment
 * @property string $created_date
 */
class RecruiterStudentComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recruiter_student_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'recruiter_id'], 'integer'],
            [['comment', 'created_date'], 'required'],
            [['comment'], 'string'],
            [['created_date'], 'safe'],
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
            'recruiter_id' => 'Recruiter ID',
            'comment' => 'Comment',
            'created_date' => 'Created Date',
        ];
    }
}
