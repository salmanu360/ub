<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LevelEducation;

/**
* LevelEducationSearch represents the model behind the search form about `common\models\LevelEducation`.
*/
class LevelEducationSearch extends LevelEducation
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'country_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['edu_name'], 'safe'],
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
$query = LevelEducation::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'edu_name', $this->edu_name]);

return $dataProvider;
}
}