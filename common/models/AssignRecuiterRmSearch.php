<?php

namespace common\models;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AssignRecuiterRm;

/**
 * AssignRecuiterRmSearch represents the model behind the search form of `common\models\AssignRecuiterRm`.
 */
class AssignRecuiterRmSearch extends AssignRecuiterRm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'recruiter_id', 'rm_id', 'user_id'], 'integer'],
            [['date_created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $userid=Yii::$app->user->id;
        $type= Yii::$app->user->identity->type;
        if($type == 5){// 5 is rm
            $query = AssignRecuiterRm::find()
            ->select(['assign_recuiter_rm.*','recruiters.*'])
            ->innerJoin('recruiters','recruiters.id = assign_recuiter_rm.recruiter_id')
            ->where([
                'assign_recuiter_rm.rm_id'=>$userid
            ])
            ->asArray();
            //->all();
            //$query = AssignRecuiterRm::find()->where(['rm_id'=>$userid]);
        }else{
            $query = AssignRecuiterRm::find();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'recruiter_id' => $this->recruiter_id,
            'rm_id' => $this->rm_id,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
        ]);

        return $dataProvider;
    }
}
