<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductWarehouseIn;

/**
 * SearchProductWarehouseIn represents the model behind the search form about `app\models\ProductWarehouseIn`.
 */
class SearchProductWarehouseIn extends ProductWarehouseIn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_in_orderid', 'warehouse_id', 'product_in_count'], 'integer'],
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
        $query = ProductWarehouseIn::find();

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
            'product_in_orderid' => $this->product_in_orderid,
            'warehouse_id' => $this->warehouse_id,
            'product_in_count' => $this->product_in_count,
        ]);

        return $dataProvider;
    }
}
