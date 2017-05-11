<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * SearchEmployee represents the model behind the search form about `app\models\Employee`.
 */
class SearchEmployee extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'department_id', 'warehouse_id', 'join_time'], 'integer'],
            [['employee_name', 'sex', 'job_name', 'email', 'address'], 'safe'],
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
        $query = Employee::find();

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
            'employee_id' => $this->employee_id,
            'department_id' => $this->department_id,
            'warehouse_id' => $this->warehouse_id,
            'join_time' => $this->join_time,
        ]);

        $query->andFilterWhere(['like', 'employee_name', $this->employee_name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'job_name', $this->job_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
