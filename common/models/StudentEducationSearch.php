<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentEducation;

/**
 * StudentEducationSearch represents the model behind the search form of `common\models\StudentEducation`.
 */
class StudentEducationSearch extends StudentEducation
{
    public $student_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'grade_scale', 'graduated_recent_school', 'created_by', 'updated_by'], 'integer'],
            [['country_of_education', 'highest_level_education', 'grading_scheme', 'grade_average', 'created_at', 'updated_at'], 'safe'],
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
        // echo '<pre>';print_r($params);die;
        $query = StudentEducation::find();

        // add conditions that should always apply here

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
            'student_id' => $this->student_id,
            'grade_scale' => $this->grade_scale,
            'graduated_recent_school' => $this->graduated_recent_school,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'country_of_education', $this->country_of_education])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'grade_average', $this->grade_average]);

        return $dataProvider;
    }
}
