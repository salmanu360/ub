<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User as UserModel;

/**
* User represents the model behind the search form about `common\models\User`.
*/
class User extends UserModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
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

const TYPE_ADMINISTRATOR=3;
const TYPE_SUPPORT_TEAM=5;
const TYPE_MANAGEMENT_TEAM=4;
const TYPE_CONTENT_MANAGEMENT_TEAM=6; //application team
const TYPE_SEO_MANAGEMENT_TEAM=7;

public function search($params)
{
        // $query = UserModel::find()->where(['in','type',[self::TYPE_ADMINISTRATOR,self::TYPE_SUPPORT_TEAM,self::TYPE_MANAGEMENT_TEAM,self::TYPE_CONTENT_MANAGEMENT_TEAM]]);
        $query = UserModel::find();
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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->orderBy(['id' => SORT_DESC]);

return $dataProvider;
}
}