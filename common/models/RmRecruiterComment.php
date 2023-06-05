<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rm_recruiter_comment".
 *
 * @property int $id
 * @property int $student_id
 * @property int $recruiter_id
 * @property int $rm_id
 * @property string $comment
 * @property string $date_created
 */
class RmRecruiterComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rm_recruiter_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'recruiter_id', 'rm_id', 'comment'], 'required'],
            [['student_id', 'recruiter_id', 'rm_id'], 'integer'],
            [['comment'], 'string'],
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
            'student_id' => 'Student',
            'recruiter_id' => 'Recruiter',
            'rm_id' => 'Rm',
            'comment' => 'Comment',
            'date_created' => 'Date Created',
        ];
    }
}
