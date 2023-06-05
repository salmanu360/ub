<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_pending_document".
 *
 * @property int $id
 * @property int $student_id
 * @property string $pending_document
 * @property int|null $lead_status
 * @property string $comment
 * @property string $date_created
 * @property int $created_by
 */
class StudentPendingDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_pending_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'pending_document', 'comment', 'created_by'], 'required'],
            [['student_id', 'lead_status', 'created_by'], 'integer'],
            [['comment'], 'string'],
            [['date_created'], 'safe'],
            [['pending_document'], 'string', 'max' => 255],
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
            'pending_document' => 'Pending Document',
            'lead_status' => 'Lead Status',
            'comment' => 'Comment',
            'date_created' => 'Date Created',
            'created_by' => 'Created By',
        ];
    }
}
