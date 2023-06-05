<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ForStudentApplications;
use frontend\models\ForStudents;

/**
* ForStudentApplicationsSearch represents the model behind the search form about `frontend\models\ForStudentApplications`.
*/
class ForStudentApplicationsSearch extends ForStudentApplications
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'student_id', 'college_id', 'course_id', 'application_fee_status', 'visa_fee_status', 'payment_date', 'pay_status', 'created_at', 'created_by'], 'integer'],
            [['application_fee', 'visa_fee'], 'number'],
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
        $user_id = Yii::$app->user->identity->id;
        $student = ForStudents::findOne(['user_id' => $user_id]);

        $query = ForStudentApplications::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
       // $query->andWhere(['application_fee_status' => 0]);        
       // $query->andWhere(['visa_fee_status' => 0]);        
        $query->andWhere(['student_id' => $student->id]);

        $query->andFilterWhere([
            'id' => $this->id,
            'student_id' => $this->student_id,
            'college_id' => $this->college_id,
            'course_id' => $this->course_id,
            'application_fee' => $this->application_fee,
            'application_fee_status' => $this->application_fee_status,
            'visa_fee' => $this->visa_fee,
            'visa_fee_status' => $this->visa_fee_status,
            'payment_date' => $this->payment_date,
            'pay_status' => $this->pay_status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        return $dataProvider;
    }

    public function search2($params)
    {
        $user_id = Yii::$app->user->identity->id;
        $student = ForStudents::findOne(['user_id' => $user_id]);

        $query = ForStudentApplications::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andWhere(['pay_status' => 1]);        
        $query->andWhere(['student_id' => $student->id]);

        $query->andFilterWhere([
            'id' => $this->id,
            'student_id' => $this->student_id,
            'college_id' => $this->college_id,
            'course_id' => $this->course_id,
            'application_fee' => $this->application_fee,
            'application_fee_status' => $this->application_fee_status,
            'visa_fee' => $this->visa_fee,
            'visa_fee_status' => $this->visa_fee_status,
            'payment_date' => $this->payment_date,
            'pay_status' => $this->pay_status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        return $dataProvider;
    }
}