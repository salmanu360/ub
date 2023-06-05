<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "more_services".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $created_date
 */
class MoreServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'more_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['created_date'], 'safe'],
            [['name', 'link'], 'string', 'max' => 255],
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
            'link' => 'Link',
            'created_date' => 'Created Date',
        ];
    }
}
