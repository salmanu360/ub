<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rm_application_team_comment".
 *
 * @property int $id
 * @property int $student_id
 * @property int $application_team_id
 * @property int $recruiter_id
 * @property string $comment
 * @property string|null $file
 * @property string $date_created
 * @property int $created_by
 */
class RmApplicationTeamComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rm_application_team_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'application_team_id', 'recruiter_id', 'comment', 'created_by'], 'required'],
            [['student_id', 'application_team_id', 'recruiter_id', 'created_by'], 'integer'],
            [['comment'], 'string'],
            [['date_created'], 'safe'],
            [['file'], 'string', 'max' => 255],
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
            'application_team_id' => 'Application Team',
            'recruiter_id' => 'Recruiter',
            'comment' => 'Comment',
            'file' => 'File',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }
}
