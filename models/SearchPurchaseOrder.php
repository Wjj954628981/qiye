<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PurchaseOrder;

/**
 * SearchPurchaseOrder represents the model behind the search form about `app\models\PurchaseOrder`.
 */
class SearchPurchaseOrder extends PurchaseOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchase_order_id', 'employee_id', 'purchase_time'], 'integer'],
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
        $query = PurchaseOrder::find();

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
            'purchase_order_id' => $this->purchase_order_id,
            'employee_id' => $this->employee_id,
            'purchase_time' => $this->purchase_time,
        ]);

        return $dataProvider;
    }
}
