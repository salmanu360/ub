<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Course;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;

/**
* CourseSearch represents the model behind the search form about `common\models\Course`.
*/
class CourseSearchs extends Course {
    public $schoolName;
    public $country;
    public $program_level;
    public $year;
    public $course;
    public $school;
    /**
    * @inheritdoc
    */
    public function rules() {    
        return [
            // [['course'], 'required'],
            [['id', 'college_id', 'discount', 'status', 'created_at', 'updated_at'], 'integer'],
            [['tution_fee', 'application_fee'], 'number'],
            [['name', 'tags','schoolName','recruiter_id'], 'safe'],
        ];
    }

    /**
    * @inheritdoc
    */
    public function scenarios() {
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

    public function coursefilter($params) {
        // echo '<pre>';print_r($params);die;
        if(!empty($params['CourseSearch']['status'])){
            $course_id= $params['CourseSearch']['status'];
            $intake= $params['CourseSearch']['intake'];
            $year= $params['CourseSearch']['year'];
        
        
        $query = Course::find()->where(['id'=>$course_id]);
        $query->joinWith(['school']);    
         
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['schoolName'] = [
            'asc' => ['school.name' => SORT_ASC],
            'desc' => ['school.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'college_id' => $this->college_id,
            'tution_fee' => $this->tution_fee,
            'application_fee' => $this->application_fee,
            'discount' => $this->discount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'school.name', $this->schoolName]);

        $query->andFilterWhere(['like', 'course.name', $this->name])
            ->andFilterWhere(['like', 'course.tags', $this->tags]);

        return $dataProvider;
    }
    }
    public function search($params) {
        $query = Course::find();
        $query->joinWith(['school']);    
         
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['schoolName'] = [
            'asc' => ['school.name' => SORT_ASC],
            'desc' => ['school.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'college_id' => $this->college_id,
            'tution_fee' => $this->tution_fee,
            'application_fee' => $this->application_fee,
            'discount' => $this->discount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'school.name', $this->schoolName]);

        $query->andFilterWhere(['like', 'course.name', $this->name])
            ->andFilterWhere(['like', 'course.tags', $this->tags]);

        return $dataProvider;
    }


    public function searchrecruiter($params) {
        $query = Course::find();
        $query->joinWith(['school']);    
         
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['schoolName'] = [
            'asc' => ['school.name' => SORT_ASC],
            'desc' => ['school.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'college_id' => $this->college_id,
            'tution_fee' => $this->tution_fee,
            'application_fee' => $this->application_fee,
            'discount' => $this->discount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'school.name', $this->schoolName]);

        $query->andFilterWhere(['like', 'course.name', $this->name])
            ->andFilterWhere(['course.recruiter_id'=>Yii::$app->user->identity->recruiter->id])
            ->andFilterWhere(['like', 'course.tags', $this->tags]);

        return $dataProvider;
    }

    public static function getCollegeByCourseId($id){
        $course = Course::findOne($id);
        $college_id = $course->college_id;

        $college = School::findOne($college_id);

        return $college;
    }

    public static function getCollegeImageByCourseId($id){
        $course = Course::findOne($id);
        $college_id = $course->college_id;
       // $college = School::findOne($college_id);

        $collegeImage = SchoolImage::findOne($college_id);    

        return !empty($collegeImage->name) ? $collegeImage->name : null;
    }

    public static function getCollegeLocationByCourseId($id){
        $course = Course::findOne($id);
        $college_id = $course->college_id;
        $college = School::findOne($college_id);
        

        $location = Country::findOne($college->dest_country);

        return !empty($location->name) ? $location->name : null;
    }
}