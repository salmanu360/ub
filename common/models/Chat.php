<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property int $chatid
 * @property int $to_user_id
 * @property int $from_user_id
 * @property string $message
 * @property int $status
 * @property string $timestamp
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['to_user_id', 'from_user_id', 'message', 'status'], 'required'],
            [['to_user_id', 'from_user_id', 'status'], 'integer'],
            [['timestamp'], 'safe'],
            [['message'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'chatid' => 'Chatid',
            'to_user_id' => 'To',
            'from_user_id' => 'From',
            'message' => 'Message',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
        ];
    }
}
