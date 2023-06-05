<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property string $module
 * @property int $status
 * @property string $created_at
 * @property string|null $created_by
 * @property string|null $name
 * @property string|null $created_by_id
 * @property int|null $seen_by
 * @property int|null $receiver_id
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module', 'created_at'], 'required'],
            [['status', 'seen_by', 'receiver_id'], 'integer'],
            [['created_at'], 'safe'],
            [['module', 'created_by', 'name', 'created_by_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => 'Module',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'name' => 'Name',
            'created_by_id' => 'Created By ID',
            'seen_by' => 'Seen By',
            'receiver_id' => 'Receiver ID',
        ];
    }
}
