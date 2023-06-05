<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\School;

/**
* SchoolSearch represents the model behind the search form about `common\models\School`.
*/
class SchoolSearch extends School
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'user_id', 'status', 'dest_country', 'created_at', 'updated_at'], 'integer'],
            [['ref_no', 'cont_fname', 'cont_last_name', 'phone_number', 'cont_email', 'cont_title', 'comment','name'], 'safe'],
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
$query = School::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
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
            'status' => $this->status,
            'dest_country' => $this->dest_country,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ref_no', strtoupper($this->ref_no)])
            ->andFilterWhere(['like', 'cont_fname', $this->cont_fname])
            ->andFilterWhere(['like', 'cont_last_name', $this->cont_last_name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'cont_email', $this->cont_email])
            ->andFilterWhere(['like', 'cont_title', $this->cont_title])
             ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'comment', $this->comment]);

return $dataProvider;
}
}