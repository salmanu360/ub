<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lead_history".
 *
 * @property int $id
 * @property string $name
 * @property int $recruiter_id
 * @property int $student_id
 * @property int $date_created
 */
class LeadHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lead_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'recruiter_id', 'student_id', 'date_created'], 'required'],
            [['recruiter_id', 'student_id', 'date_created'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'recruiter_id' => 'Recruiter ID',
            'student_id' => 'Student ID',
            'date_created' => 'Date Created',
        ];
    }
}
