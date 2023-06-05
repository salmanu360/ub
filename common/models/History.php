<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property string $module
 * @property string $action
 * @property int|null $created_by
 * @property string $created_at
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module', 'action', 'created_at'], 'required'],
            [['created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['module', 'action'], 'string', 'max' => 255],
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
            'action' => 'Action',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }
}
