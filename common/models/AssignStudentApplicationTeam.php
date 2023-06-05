<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assign_student_application_team".
 *
 * @property int $id
 * @property int $student_id
 * @property int $application_team_id
 * @property int $created_by
 * @property string $date_created
 */
class AssignStudentApplicationTeam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_student_application_team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'application_team_id', 'created_by'], 'required'],
            [['student_id', 'application_team_id', 'created_by'], 'integer'],
            [['date_created'], 'safe'],
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
            'created_by' => 'Created By',
            'date_created' => 'Date Created',
        ];
    }
}
