<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recruiter_comment".
 *
 * @property int $id
 * @property string|null $comment
 * @property int|null $recruiter_id
 * @property int|null $created_by
 * @property string|null $created_at
 */
class RecruiterComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recruiter_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recruiter_id','comment'], 'required'],
            [['comment'], 'string'],
            [['recruiter_id', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
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
            'recruiter_id' => 'Recruiter ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }
}
