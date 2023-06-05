<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ForPaymentHistory;

/**
* ForPaymentHistorySearch represents the model behind the search form about `frontend\models\ForPaymentHistory`.
*/
class ForPaymentHistorySearch extends ForPaymentHistory
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'application_id', 'student_id', 'course_id', 'college_id', 'payment_date', 'status', 'created_by', 'created_at'], 'integer'],
            [['razorpay_payment_id', 'student', 'course', 'college', 'currency', 'payment_method', 'payment_type'], 'safe'],
            [['amount'], 'number'],
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
$query = ForPaymentHistory::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$user_id = Yii::$app->user->identity->id;
$student = \frontend\models\ForStudents::findOne(['user_id' => $user_id]);

$query->where(['student_id' => $student->id]);

$query->andFilterWhere([
            'id' => $this->id,
            'application_id' => $this->application_id,
            'student_id' => $this->student_id,
            'course_id' => $this->course_id,
            'college_id' => $this->college_id,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'razorpay_payment_id', $this->razorpay_payment_id])
            ->andFilterWhere(['like', 'student', $this->student])
            ->andFilterWhere(['like', 'course', $this->course])
            ->andFilterWhere(['like', 'college', $this->college])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type]);

return $dataProvider;
}
}