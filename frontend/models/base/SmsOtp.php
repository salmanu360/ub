<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "sms_otp".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $otp_session_id
 * @property integer $status
 * @property integer $verified
 * @property integer $created_at
 * @property string $aliasModel
 */
abstract class SmsOtp extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms_otp';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'otp_session_id', 'status', 'verified'], 'required'],
            [['user_id', 'status', 'verified'], 'integer'],
            [['otp_session_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'otp_session_id' => 'Otp Session ID',
            'status' => 'Status',
            'verified' => 'Verified',
            'created_at' => 'Created At',
        ];
    }




}
