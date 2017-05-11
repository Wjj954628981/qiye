<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductProcess;

/**
 * SearchProductProcess represents the model behind the search form about `app\models\ProductProcess`.
 */
class SearchProductProcess extends ProductProcess
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'process_id'], 'integer'],
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
        $query = ProductProcess::find();

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
            'product_id' => $this->product_id,
            'process_id' => $this->process_id,
        ]);

        return $dataProvider;
    }
}
