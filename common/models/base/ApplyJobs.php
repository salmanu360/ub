<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "applied_jobs".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $experience
 * @property string $resume
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $aliasModel
 */
abstract class ApplyJobs extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applied_jobs';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name'], 'string', 'max' => 120],
            [['email'], 'string', 'max' => 65],
            [['phone'], 'string', 'max' => 15],
            [['experience'], 'string', 'max' => 20],
            [['resume'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'experience' => 'Experience',
            'resume' => 'Resume',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }




}
