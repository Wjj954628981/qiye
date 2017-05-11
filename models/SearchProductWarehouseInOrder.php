<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductWarehouseInOrder;

/**
 * SearchProductWarehouseInOrder represents the model behind the search form about `app\models\ProductWarehouseInOrder`.
 */
class SearchProductWarehouseInOrder extends ProductWarehouseInOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_in_orderid', 'employee_id', 'product_in_ordertime'], 'integer'],
            [['product_in_orderremark'], 'safe'],
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
        $query = ProductWarehouseInOrder::find();

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
            'product_in_orderid' => $this->product_in_orderid,
            'employee_id' => $this->employee_id,
            'product_in_ordertime' => $this->product_in_ordertime,
        ]);

        $query->andFilterWhere(['like', 'product_in_orderremark', $this->product_in_orderremark]);

        return $dataProvider;
    }
}
