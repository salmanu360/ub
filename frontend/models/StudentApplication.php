<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentCollegeApplied;
use common\models\Recruiters;

/**
* StudentApplication represents the model behind the search form about `common\models\StudentCollegeApplied`.
*/
class StudentApplication extends StudentCollegeApplied
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'student_id', 'college_id', 'recruiter_id', 'created_at', 'created_by'], 'integer'],
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
$query = StudentCollegeApplied::find();

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
            'student_id' => $this->student_id,
            'college_id' => $this->college_id,
            'recruiter_id' => $this->recruiter_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

$user_id = Yii::$app->user->identity->id;
 $recruiter = Recruiters::findOne(['user_id' => $user_id]);



$query->where(['recruiter_id'=>$recruiter->id]);

return $dataProvider;
}
}