<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lead_statuses".
 *
 * @property int $id
 * @property string $name
 * @property string $date_created
 */
class LeadStatuses extends \yii\db\ActiveRecord
{
    public $recruiter_id;
    public $student_id;
    public $status;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lead_statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date_created'], 'required'],
            [['date_created'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'date_created' => 'Date Created',
        ];
    }
}
