<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property int $college_id
 * @property int|null $country_id
 * @property int|null $province
 * @property string|null $application_fee
 * @property string|null $registeration_fee
 * @property string|null $tution_fee
 * @property string|null $currency
 * @property string $name
 * @property string|null $course_category
 * @property string|null $program
 * @property string|null $duration
 * @property string|null $discount
 * @property string|null $tags
 * @property int|null $status
 * @property string $comment
 * @property int|null $recruiter_id
 * @property string $created_at
 * @property string|null $year
 * @property string|null $intake
 * @property string|null $entry_requirement
 * @property string|null $updated_at
 * @property string|null $comission
 *
 * @property School $college
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['college_id', 'name', 'comment','country_id','province'], 'required'],
            [['college_id', 'country_id', 'province', 'status', 'recruiter_id'], 'integer'],
            [['tags', 'comment', 'entry_requirement'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['application_fee', 'tution_fee'], 'string', 'max' => 50],
            [['registeration_fee', 'course_category', 'program', 'duration', 'discount', 'year', 'intake', 'comission'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 120],
            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['college_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'college_id' => 'College',
            'country_id' => 'Country',
            'province' => 'Province',
            'application_fee' => 'Application Fee',
            'registeration_fee' => 'Registeration Fee',
            'tution_fee' => 'Tution Fee',
            'currency' => 'Currency',
            'name' => 'Name',
            'course_category' => 'Course Category',
            'program' => 'Program',
            'duration' => 'Duration',
            'discount' => 'Discount',
            'tags' => 'Tags',
            'status' => 'Status',
            'comment' => 'Comment',
            'recruiter_id' => 'Recruiter',
            'created_at' => 'Created At',
            'year' => 'Year',
            'intake' => 'Intake',
            'entry_requirement' => 'Entry Requirement',
            'updated_at' => 'Updated At',
            'comission' => 'Comission',
        ];
    }

    /**
     * Gets query for [[College]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(School::className(), ['id' => 'college_id']);
    }
    public function getSchool()
    {
        return $this->hasOne(\common\models\School::className(), ['id' => 'college_id']);
    }
}
