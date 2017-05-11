<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductWarehouseOut;

/**
 * SearchProductWarehouseOut represents the model behind the search form about `app\models\ProductWarehouseOut`.
 */
class SearchProductWarehouseOut extends ProductWarehouseOut
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'warehouse_id', 'product_out_orderid', 'product_out_count'], 'integer'],
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
        $query = ProductWarehouseOut::find();

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
            'warehouse_id' => $this->warehouse_id,
            'product_out_orderid' => $this->product_out_orderid,
            'product_out_count' => $this->product_out_count,
        ]);

        return $dataProvider;
    }
}
