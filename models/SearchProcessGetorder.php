<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProcessGetorder;

/**
 * SearchProcessGetorder represents the model behind the search form about `app\models\ProcessGetorder`.
 */
class SearchProcessGetorder extends ProcessGetorder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['process_getorderid', 'process_id', 'process_getordertime'], 'integer'],
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
        $query = ProcessGetorder::find();

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
            'process_getorderid' => $this->process_getorderid,
            'process_id' => $this->process_id,
            'process_getordertime' => $this->process_getordertime,
        ]);

        return $dataProvider;
    }
}
