<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $contact_number
 * @property string $subject
 * @property string $message
 * @property string $date_created
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'contact_number', 'subject', 'message'], 'required'],
            [['contact_number'], 'integer'],
            [['date_created'], 'safe'],
            [['name', 'email', 'subject', 'message'], 'string', 'max' => 255],
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
            'contact_number' => 'Contact Number',
            'subject' => 'Subject',
            'message' => 'Message',
            'date_created' => 'Date Created',
        ];
    }
}
