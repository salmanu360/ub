<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ForStudents;

/**
* ForStudentsSearch represents the model behind the search form about `frontend\models\ForStudents`.
*/
class ForStudentsSearch extends ForStudents
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'user_id', 'country_of_citizenship', 'country', 'country_of_education', 'grade_scale', 'graduated_recent_school', 'exact_score_listening', 'exact_score_reading', 'exact_score_writing', 'exact_score_speaking', 'exact_score_overall', 'have_gre_exam', 'gre_verbal_score', 'gre_verbal_rank', 'gre_quantitative_score', 'gre_quantitative_rank', 'gre_writing_score', 'gre_writing_rank', 'have_gmat_exam', 'gmat_verbal_score', 'gmat_verbal_rank', 'gmat_quantitative_score', 'gmat_quantitative_rank', 'gmat_writing_score', 'gmat_writing_rank', 'gmat_total_score', 'gmat_total_rank', 'refused_visa', 'consent', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'birth_date', 'phone_no', 'gender', 'first_language', 'marital_status', 'country_of_interest', 'service_of_interest', 'passport_no', 'passport_expiry_date', 'address', 'city', 'state', 'zip_code', 'highest_level_education', 'grading_scheme', 'grade_average', 'english_exam_type', 'date_of_exam', 'gre_exam_date', 'gmat_exam_date', 'study_permit', 'details', 'upload_document'], 'safe'],
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
$query = ForStudents::find();

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
            'user_id' => $this->user_id,
            'birth_date' => $this->birth_date,
            'country_of_citizenship' => $this->country_of_citizenship,
            'passport_expiry_date' => $this->passport_expiry_date,
            'country' => $this->country,
            'country_of_education' => $this->country_of_education,
            'grade_scale' => $this->grade_scale,
            'graduated_recent_school' => $this->graduated_recent_school,
            'date_of_exam' => $this->date_of_exam,
            'exact_score_listening' => $this->exact_score_listening,
            'exact_score_reading' => $this->exact_score_reading,
            'exact_score_writing' => $this->exact_score_writing,
            'exact_score_speaking' => $this->exact_score_speaking,
            'exact_score_overall' => $this->exact_score_overall,
            'have_gre_exam' => $this->have_gre_exam,
            'gre_exam_date' => $this->gre_exam_date,
            'gre_verbal_score' => $this->gre_verbal_score,
            'gre_verbal_rank' => $this->gre_verbal_rank,
            'gre_quantitative_score' => $this->gre_quantitative_score,
            'gre_quantitative_rank' => $this->gre_quantitative_rank,
            'gre_writing_score' => $this->gre_writing_score,
            'gre_writing_rank' => $this->gre_writing_rank,
            'have_gmat_exam' => $this->have_gmat_exam,
            'gmat_exam_date' => $this->gmat_exam_date,
            'gmat_verbal_score' => $this->gmat_verbal_score,
            'gmat_verbal_rank' => $this->gmat_verbal_rank,
            'gmat_quantitative_score' => $this->gmat_quantitative_score,
            'gmat_quantitative_rank' => $this->gmat_quantitative_rank,
            'gmat_writing_score' => $this->gmat_writing_score,
            'gmat_writing_rank' => $this->gmat_writing_rank,
            'gmat_total_score' => $this->gmat_total_score,
            'gmat_total_rank' => $this->gmat_total_rank,
            'refused_visa' => $this->refused_visa,
            'consent' => $this->consent,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'first_language', $this->first_language])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'country_of_interest', $this->country_of_interest])
            ->andFilterWhere(['like', 'service_of_interest', $this->service_of_interest])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'grade_average', $this->grade_average])
            ->andFilterWhere(['like', 'english_exam_type', $this->english_exam_type])
            ->andFilterWhere(['like', 'study_permit', $this->study_permit])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'upload_document', $this->upload_document]);

return $dataProvider;
}
}