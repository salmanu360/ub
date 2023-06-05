<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\College;
use common\models\School;
use common\models\Country;
use common\models\SchoolImage;

/**
* CourseSearch represents the model behind the search form about `common\models\Course`.
*/
class CollegeSearch extends College {
    /**
    * @inheritdoc
    */
    public function rules() {    
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'meta_title','avg_price','meta_description','meta_keywords','description','title','latitude','longitude'], 'safe'],
        ];
    }


    public function search($params)
    {
        $query = College::find();
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
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ]);

                $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

    /**
    * @inheritdoc
    */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


}