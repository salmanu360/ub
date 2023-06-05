<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "study_apply".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property int $college_id
 * @property string $additional_message
 * @property string $created_at
 */
class StudyApply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'study_apply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'city', 'state', 'zip_code', 'college_id', 'additional_message', 'created_at'], 'required'],
            [['email', 'additional_message'], 'string'],
            [['college_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'phone', 'city', 'state', 'zip_code'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'state' => 'State',
            'zip_code' => 'Zip Code',
            'college_id' => 'College ID',
            'additional_message' => 'Additional Message',
            'created_at' => 'Created At',
        ];
    }
}
