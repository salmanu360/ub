<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assign_recuiter_rm".
 *
 * @property int $id
 * @property int $recruiter_id
 * @property int $rm_id
 * @property int $user_id
 * @property string $date_created
 */
class AssignRecuiterRm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_recuiter_rm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recruiter_id', 'rm_id', 'user_id'], 'required'],
            [['recruiter_id', 'rm_id', 'user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['recruiter_id'], 'unique'],
            //[['recruiter_id', 'rm_id'], 'unique', 'targetAttribute' => ['recruiter_id', 'rm_id']],
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
            'rm_id' => 'RM',
            'user_id' => 'User',
            'date_created' => 'Date Created',
        ];
    }
}
