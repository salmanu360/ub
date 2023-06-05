<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recruiter_notes".
 *
 * @property int $id
 * @property string $notes
 * @property string $created_date
 * @property int $created_by
 * @property int $recruiter_id
 */
class RecruiterNotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recruiter_notes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notes', 'created_by', 'recruiter_id'], 'required'],
            [['notes'], 'string'],
            [['created_date'], 'safe'],
            [['created_by', 'recruiter_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'notes' => 'Notes',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'recruiter_id' => 'Recruiter ID',
        ];
    }
}
