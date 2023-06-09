<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "recruiters".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ref_no
 * @property integer $status
 * @property string $company_name
 * @property string $email
 * @property string $website
 * @property string $facebook_page
 * @property string $instagram_handle
 * @property string $twitter_handle
 * @property string $linked_url
 * @property integer $main_source
 * @property string $owner_first_name
 * @property string $owner_last_name
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property integer $country
 * @property integer $postal_code
 * @property string $phone
 * @property string $cellphone
 * @property string $sky_id
 * @property string $whatsapp_id
 * @property string $refer_name
 * @property string $begin_rec_time
 * @property string $client_service
 * @property string $rep_students
 * @property string $inst_rep
 * @property string $edu_org_bl
 * @property integer $recut_form
 * @property integer $stu_abroad_year
 * @property string $market_methods
 * @property integer $aver_service_fee
 * @property integer $refer_stu_univer
 * @property string $add_comment
 * @property string $refrence_name
 * @property string $ref_stu_name
 * @property string $ref_business_email
 * @property string $ref_phone
 * @property string $ref_website
 * @property string $comp_logo
 * @property string $bus_certificate
 * @property integer $confirmation
 * @property string $bank_name
 * @property string $bank_address
 * @property string $institution_number
 * @property string $transit_number
 * @property string $account_number
 * @property string $swift_code
 * @property string $account_name
 * @property string $comments
 * @property integer $acceptance
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $aliasModel
 */
abstract class Recruiters extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recruiters';
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
            [['user_id', 'status', 'main_source', 'country', 'postal_code', 'recut_form', 'stu_abroad_year', 'aver_service_fee', 'refer_stu_univer', 'confirmation', 'acceptance'], 'integer'],
            [['ref_no', 'status', 'company_name', 'email', 'main_source', 'owner_first_name', 'owner_last_name', 'street_address', 'city', 'country', 'phone', 'aver_service_fee', 'acceptance'], 'required'],
            [['street_address', 'client_service', 'inst_rep', 'edu_org_bl', 'add_comment', 'bank_address', 'comments'], 'string'],
            [['ref_no', 'phone', 'cellphone', 'rep_students', 'ref_phone', 'swift_code'], 'string', 'max' => 20],
            [['company_name', 'owner_first_name', 'owner_last_name', 'city', 'state', 'refer_name', 'refrence_name', 'ref_stu_name', 'ref_business_email', 'comp_logo', 'bus_certificate'], 'string', 'max' => 120],
            [['email'], 'string', 'max' => 50],
            [['website', 'sky_id', 'whatsapp_id'], 'string', 'max' => 40],
            [['facebook_page', 'instagram_handle', 'twitter_handle', 'begin_rec_time'], 'string', 'max' => 150],
            [['linked_url'], 'string', 'max' => 240],
            [['market_methods'], 'string', 'max' => 30],
            [['ref_website'], 'string', 'max' => 220],
            [['bank_name', 'account_name'], 'string', 'max' => 255],
            [['institution_number', 'transit_number', 'account_number'], 'string', 'max' => 24]
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
            'ref_no' => 'Ref No',
            'status' => 'Status',
            'company_name' => 'Company Name',
            'email' => 'Email',
            'website' => 'Website',
            'facebook_page' => 'Facebook Page',
            'instagram_handle' => 'Instagram Handle',
            'twitter_handle' => 'Twitter Handle',
            'linked_url' => 'Linked Url',
            'main_source' => 'Main Source',
            'owner_first_name' => 'Owner First Name',
            'owner_last_name' => 'Owner Last Name',
            'street_address' => 'Street Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'postal_code' => 'Postal Code',
            'phone' => 'Phone',
            'cellphone' => 'Cellphone',
            'sky_id' => 'Sky ID',
            'whatsapp_id' => 'Whatsapp ID',
            'refer_name' => 'Refer Name',
            'begin_rec_time' => 'Begin Rec Time',
            'client_service' => 'Client Service',
            'rep_students' => 'Rep Students',
            'inst_rep' => 'Inst Rep',
            'edu_org_bl' => 'Edu Org Bl',
            'recut_form' => 'Recut Form',
            'stu_abroad_year' => 'Stu Abroad Year',
            'market_methods' => 'Market Methods',
            'aver_service_fee' => 'Aver Service Fee',
            'refer_stu_univer' => 'Refer Stu Univer',
            'add_comment' => 'Add Comment',
            'refrence_name' => 'Refrence Name',
            'ref_stu_name' => 'Ref Stu Name',
            'ref_business_email' => 'Ref Business Email',
            'ref_phone' => 'Ref Phone',
            'ref_website' => 'Ref Website',
            'comp_logo' => 'Comp Logo',
            'bus_certificate' => 'Bus Certificate',
            'confirmation' => 'Confirmation',
            'bank_name' => 'Bank Name',
            'bank_address' => 'Bank Address',
            'institution_number' => 'Institution Number',
            'transit_number' => 'Transit Number',
            'account_number' => 'Account Number',
            'swift_code' => 'Swift Code',
            'account_name' => 'Account Name',
            'comments' => 'Comments',
            'acceptance' => 'Acceptance',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }




}
