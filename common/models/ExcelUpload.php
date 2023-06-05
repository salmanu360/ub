<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "excel_upload".
 *
 * @property int $id
 * @property string $file
 * @property string $date_created
 */
class ExcelUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'excel_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file', 'date_created'], 'required'],
            [['date_created'], 'safe'],
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'date_created' => 'Date Created',
        ];
    }
}
