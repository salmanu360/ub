<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "get_in_touch_country".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $study_country
 * @property string $date_created
 */
class GetInTouchCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'get_in_touch_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'study_country'], 'required'],
            [['date_created'], 'safe'],
            [['name', 'email', 'phone', 'study_country'], 'string', 'max' => 255],
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
            'study_country' => 'Study Country',
            'date_created' => 'Date Created',
        ];
    }
}
