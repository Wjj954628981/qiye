<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WarehouseProduct;

/**
 * SearchWarehouseProduct represents the model behind the search form about `app\models\WarehouseProduct`.
 */
class SearchWarehouseProduct extends WarehouseProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'warehouse_id', 'product_count'], 'integer'],
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
        $query = WarehouseProduct::find();

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
            'product_count' => $this->product_count,
        ]);

        return $dataProvider;
    }
}
