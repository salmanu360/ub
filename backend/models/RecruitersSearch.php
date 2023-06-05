<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Recruiters;

/**
* RecruitersSearch represents the model behind the search form about `common\models\Recruiters`.
*/
class RecruitersSearch extends Recruiters
{

      public $start_date,$end_date;
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'user_id', 'instagram_handle', 'twitter_handle', 'linked_url', 'main_source', 'country', 'postal_code', 'recut_form', 'stu_abroad_year', 'aver_service_fee', 'refer_stu_univer', 'confirmation', 'created_at', 'updated_at'], 'integer'],
            [['company_name', 'email', 'ref_no','website', 'facebook_page', 'street_address', 'city', 'state','owner_first_name', 'owner_last_name','phone', 'cellphone', 'sky_id', 'whatsapp_id', 'refer_name', 'begin_rec_time', 'client_service', 'rep_students', 'inst_rep', 'edu_org_bl', 'market_methods', 'add_comment', 'refrence_name', 'ref_stu_name', 'ref_business_email', 'ref_phone', 'ref_website', 'comp_logo', 'bus_certificate'], 'safe'],

            [['start_date','end_date'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = Recruiters::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'instagram_handle' => $this->instagram_handle,
            'twitter_handle' => $this->twitter_handle,
            'linked_url' => $this->linked_url,
            'main_source' => $this->main_source,
            'owner_first_name' => $this->owner_first_name,
            'owner_last_name' => $this->owner_last_name,
            'country' => $this->country,
            'postal_code' => $this->postal_code,
            'recut_form' => $this->recut_form,
            'stu_abroad_year' => $this->stu_abroad_year,
            'aver_service_fee' => $this->aver_service_fee,
            'refer_stu_univer' => $this->refer_stu_univer,
            'confirmation' => $this->confirmation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'facebook_page', $this->facebook_page])
            ->andFilterWhere(['like', 'street_address', $this->street_address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'ref_no', $this->ref_no])
            ->andFilterWhere(['like', 'cellphone', $this->cellphone])
            ->andFilterWhere(['like', 'sky_id', $this->sky_id])
            ->andFilterWhere(['like', 'whatsapp_id', $this->whatsapp_id])
            ->andFilterWhere(['like', 'refer_name', $this->refer_name])
            ->andFilterWhere(['like', 'begin_rec_time', $this->begin_rec_time])
            ->andFilterWhere(['like', 'client_service', $this->client_service])
            ->andFilterWhere(['like', 'rep_students', $this->rep_students])
            ->andFilterWhere(['like', 'inst_rep', $this->inst_rep])
            ->andFilterWhere(['like', 'edu_org_bl', $this->edu_org_bl])
            ->andFilterWhere(['like', 'market_methods', $this->market_methods])
            ->andFilterWhere(['like', 'add_comment', $this->add_comment])
            ->andFilterWhere(['like', 'refrence_name', $this->refrence_name])
            ->andFilterWhere(['like', 'ref_stu_name', $this->ref_stu_name])
            ->andFilterWhere(['like', 'ref_business_email', $this->ref_business_email])
            ->andFilterWhere(['like', 'ref_phone', $this->ref_phone])
            ->andFilterWhere(['like', 'ref_website', $this->ref_website])
            ->andFilterWhere(['like', 'comp_logo', $this->comp_logo])
            ->andFilterWhere(['like', 'bus_certificate', $this->bus_certificate]);

                  if(!empty($this->start_date)&& !empty($this->end_date)){
                        $query->andFilterWhere([
                        'between', 
                        'created_at', 
                        strtotime($this->start_date),strtotime($this->end_date)
                        ]);
            }

return $dataProvider;
}
}