<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_eligible_noteligible".
 *
 * @property int $id
 * @property string $comment
 * @property string $created_date
 * @property int $created_by
 * @property int $student_id
 * @property int $status
 */
class StudentEligibleNoteligible extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_eligible_noteligible';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment', 'created_by', 'student_id', 'status'], 'required'],
            [['comment'], 'string'],
            [['created_date'], 'safe'],
            [['created_by', 'student_id', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'student_id' => 'Student ID',
            'status' => 'Status',
        ];
    }
}
