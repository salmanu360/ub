<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Student;
use common\models\AssignRecuiterRm;
/**
* StudentSearch represents the model behind the search form about `common\models\Student`.
*/
if (Yii::$app->user->isGuest){
return Yii::$app->getResponse()->redirect(array(Url::to(['site/login'],302)));
}
class StudentSearch extends Student
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['ID', 'recruiter_id', 'country_of_citizenship', 'country', 'country_of_education', 'graduated_recent_school', 'exact_score_listening', 'exact_score_reading', 'exact_score_writing', 'exact_score_speaking', 'exact_score_overall', 'refused_visa', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'birth_date', 'email_id', 'phone_no', 'gender', 'first_language', 'marital_status', 'lead_status', 'referral_source', 'passport_no', 'passport_expiry_date', 'address', 'city', 'state', 'zip_code', 'highest_level_education', 'grading_scheme', 'english_exam_type', 'date_of_exam', 'study_permit', 'details', 'upload_document','status'], 'safe'],
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

    public function searchapplicationteam($params)
    {
        // echo '<pre>';print_r($query);die;
        $userid=Yii::$app->user->id;
        $type= Yii::$app->user->identity->type;
        /*if($type == 6){
            $s=Yii::$app->createCommand();
            $AssignStudentApplicationTeam = \common\models\AssignStudentApplicationTeam::find()->where(['application_team_id'=>1])->one();
            $query = Student::find()->where(['ID'=>$AssignStudentApplicationTeam->student_id]);
        }else{
            $query = Student::find();
        }*/
        $query = Student::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ID' => SORT_DESC]],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'recruiter_id' => $this->recruiter_id,
            'birth_date' => $this->birth_date,
            'country_of_citizenship' => $this->country_of_citizenship,
            'passport_expiry_date' => $this->passport_expiry_date,
            'country' => $this->country,
            'country_of_education' => $this->country_of_education,
            'graduated_recent_school' => $this->graduated_recent_school,
            'date_of_exam' => $this->date_of_exam,
            'exact_score_listening' => $this->exact_score_listening,
            'exact_score_reading' => $this->exact_score_reading,
            'exact_score_writing' => $this->exact_score_writing,
            'exact_score_speaking' => $this->exact_score_speaking,
            'exact_score_overall' => $this->exact_score_overall,
            'refused_visa' => $this->refused_visa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->where(['recruiter_id' => Yii::$app->user->identity->recruiter->id]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'first_language', $this->first_language])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'lead_status', $this->lead_status])
            ->andFilterWhere(['like', 'referral_source', $this->referral_source])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'english_exam_type', $this->english_exam_type])
            ->andFilterWhere(['like', 'study_permit', $this->study_permit])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'upload_document', $this->upload_document]);

        return $dataProvider;
    }

    public function searchreportadmin($params)
    {
         //echo '<pre>';print_r($params);die;
        $userid=Yii::$app->user->id;
        $type= Yii::$app->user->identity->type;
        if(isset($params['StudentSearch']['created_date'])){
            $start_date =$params['StudentSearch']['created_date'];
            $end_date_convert =$params['StudentSearch']['intake'];
            $end_date =date('Y-m-d', strtotime("+1 day", strtotime($end_date_convert)));
            $where = "created_date BETWEEN '".date($start_date)."' and '".date($end_date)."'";
            $query=Student::find()->orderBy(['ID'=>SORT_DESC])->where($where);
        }else if(isset($params['StudentSearch']['created_date']) && isset($_GET['id'])){
            $start_date =$params['StudentSearch']['created_date'];
            $end_date_convert =$params['StudentSearch']['intake'];
            $end_date =date('Y-m-d', strtotime("+1 day", strtotime($end_date_convert)));
            $where = "lead_status='".$_GET['id']."' and created_date BETWEEN '".date($start_date)."' and '".date($end_date)."'";
            $query=Student::find()->orderBy(['ID'=>SORT_DESC])->where($where);
        }else{
            if(isset($_GET['id'])){
                $get_id=$_GET['id'];
                $query=Student::find()->where(['lead_status'=>$get_id])->orderBy(['ID'=>SORT_DESC]);
            }else{
                $query=Student::find()->orderBy(['ID'=>SORT_DESC]);
            }
            
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ID' => SORT_DESC]],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'recruiter_id' => $this->recruiter_id,
            'birth_date' => $this->birth_date,
            'country_of_citizenship' => $this->country_of_citizenship,
            'passport_expiry_date' => $this->passport_expiry_date,
            'country' => $this->country,
            'country_of_education' => $this->country_of_education,
            'graduated_recent_school' => $this->graduated_recent_school,
            'date_of_exam' => $this->date_of_exam,
            'exact_score_listening' => $this->exact_score_listening,
            'exact_score_reading' => $this->exact_score_reading,
            'exact_score_writing' => $this->exact_score_writing,
            'exact_score_speaking' => $this->exact_score_speaking,
            'exact_score_overall' => $this->exact_score_overall,
            'refused_visa' => $this->refused_visa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->where(['recruiter_id' => Yii::$app->user->identity->recruiter->id]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'first_language', $this->first_language])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'lead_status', $this->lead_status])
            ->andFilterWhere(['like', 'referral_source', $this->referral_source])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'english_exam_type', $this->english_exam_type])
            ->andFilterWhere(['like', 'study_permit', $this->study_permit])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'upload_document', $this->upload_document]);

        return $dataProvider;
    }

    

    public function searchreport($params)
    {
         //echo '<pre>';print_r($params);die;
        $userid=Yii::$app->user->id;
        $type= Yii::$app->user->identity->type;
        if(isset($params['StudentSearch']['created_date'])){
            $start_date =$params['StudentSearch']['created_date'];
            $end_date_convert =$params['StudentSearch']['intake'];
            $end_date =date('Y-m-d', strtotime("+1 day", strtotime($end_date_convert)));
            $where = "created_date BETWEEN '".date($start_date)."' and '".date($end_date)."'";
            $query=Student::find()->orderBy(['ID'=>SORT_DESC])->where($where);
        }else{
            $query=Student::find()->orderBy(['ID'=>SORT_DESC]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ID' => SORT_DESC]],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'recruiter_id' => $this->recruiter_id,
            'birth_date' => $this->birth_date,
            'country_of_citizenship' => $this->country_of_citizenship,
            'passport_expiry_date' => $this->passport_expiry_date,
            'country' => $this->country,
            'country_of_education' => $this->country_of_education,
            'graduated_recent_school' => $this->graduated_recent_school,
            'date_of_exam' => $this->date_of_exam,
            'exact_score_listening' => $this->exact_score_listening,
            'exact_score_reading' => $this->exact_score_reading,
            'exact_score_writing' => $this->exact_score_writing,
            'exact_score_speaking' => $this->exact_score_speaking,
            'exact_score_overall' => $this->exact_score_overall,
            'refused_visa' => $this->refused_visa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->where(['recruiter_id' => Yii::$app->user->identity->recruiter->id]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'first_language', $this->first_language])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'lead_status', $this->lead_status])
            ->andFilterWhere(['like', 'referral_source', $this->referral_source])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'english_exam_type', $this->english_exam_type])
            ->andFilterWhere(['like', 'study_permit', $this->study_permit])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'upload_document', $this->upload_document]);

        return $dataProvider;
    }

    

    public function totallead($params)
    {
        $query = Student::find()->where(['lead_status'=>$params]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ID' => SORT_DESC]],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'recruiter_id' => $this->recruiter_id,
            'birth_date' => $this->birth_date,
            'country_of_citizenship' => $this->country_of_citizenship,
            'passport_expiry_date' => $this->passport_expiry_date,
            'country' => $this->country,
            'country_of_education' => $this->country_of_education,
            'graduated_recent_school' => $this->graduated_recent_school,
            'date_of_exam' => $this->date_of_exam,
            'exact_score_listening' => $this->exact_score_listening,
            'exact_score_reading' => $this->exact_score_reading,
            'exact_score_writing' => $this->exact_score_writing,
            'exact_score_speaking' => $this->exact_score_speaking,
            'exact_score_overall' => $this->exact_score_overall,
            'refused_visa' => $this->refused_visa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->where(['recruiter_id' => Yii::$app->user->identity->recruiter->id]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'first_language', $this->first_language])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'lead_status', $this->lead_status])
            ->andFilterWhere(['like', 'referral_source', $this->referral_source])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'english_exam_type', $this->english_exam_type])
            ->andFilterWhere(['like', 'study_permit', $this->study_permit])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'upload_document', $this->upload_document]);

        return $dataProvider;
    }


    public function searchadmin($params)
    {
        // echo '<pre>';print_r($query);die;
        $userid=Yii::$app->user->id;
        $type= Yii::$app->user->identity->type;
        if($type == 5){// 5 is rm
            $AssignRecuiterRm = AssignRecuiterRm::find()->where(['rm_id'=>$userid])->one();
            $query = Student::find()->where(['recruiter_id'=>$AssignRecuiterRm->recruiter_id]);
        }else{
            $query = Student::find();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ID' => SORT_DESC]],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'recruiter_id' => $this->recruiter_id,
            'birth_date' => $this->birth_date,
            'country_of_citizenship' => $this->country_of_citizenship,
            'passport_expiry_date' => $this->passport_expiry_date,
            'country' => $this->country,
            'country_of_education' => $this->country_of_education,
            'graduated_recent_school' => $this->graduated_recent_school,
            'date_of_exam' => $this->date_of_exam,
            'exact_score_listening' => $this->exact_score_listening,
            'exact_score_reading' => $this->exact_score_reading,
            'exact_score_writing' => $this->exact_score_writing,
            'exact_score_speaking' => $this->exact_score_speaking,
            'exact_score_overall' => $this->exact_score_overall,
            'refused_visa' => $this->refused_visa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // $query->where(['recruiter_id' => Yii::$app->user->identity->recruiter->id]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'first_language', $this->first_language])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'lead_status', $this->lead_status])
            ->andFilterWhere(['like', 'referral_source', $this->referral_source])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'english_exam_type', $this->english_exam_type])
            ->andFilterWhere(['like', 'study_permit', $this->study_permit])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'upload_document', $this->upload_document]);

        return $dataProvider;
    }
    public function search($params)
    {
        $query = Student::find()->where(['recruiter_id' => Yii::$app->user->identity->recruiter->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['ID' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'recruiter_id' => $this->recruiter_id,
            'birth_date' => $this->birth_date,
            'country_of_citizenship' => $this->country_of_citizenship,
            'passport_expiry_date' => $this->passport_expiry_date,
            'country' => $this->country,
            'country_of_education' => $this->country_of_education,
            'graduated_recent_school' => $this->graduated_recent_school,
            'date_of_exam' => $this->date_of_exam,
            'exact_score_listening' => $this->exact_score_listening,
            'exact_score_reading' => $this->exact_score_reading,
            'exact_score_writing' => $this->exact_score_writing,
            'exact_score_speaking' => $this->exact_score_speaking,
            'exact_score_overall' => $this->exact_score_overall,
            'refused_visa' => $this->refused_visa,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->where(['recruiter_id' => Yii::$app->user->identity->recruiter->id]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'first_language', $this->first_language])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'lead_status', $this->lead_status])
            ->andFilterWhere(['like', 'referral_source', $this->referral_source])
            ->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'highest_level_education', $this->highest_level_education])
            ->andFilterWhere(['like', 'grading_scheme', $this->grading_scheme])
            ->andFilterWhere(['like', 'english_exam_type', $this->english_exam_type])
            ->andFilterWhere(['like', 'study_permit', $this->study_permit])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'upload_document', $this->upload_document]);

        return $dataProvider;
    }
}