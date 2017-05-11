<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PurchaseOrderDetail;

/**
 * SearchPurchaseOrderDetail represents the model behind the search form about `app\models\PurchaseOrderDetail`.
 */
class SearchPurchaseOrderDetail extends PurchaseOrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'material_id', 'purchase_order_id', 'material_count'], 'integer'],
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
        $query = PurchaseOrderDetail::find();

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
            'supplier_id' => $this->supplier_id,
            'material_id' => $this->material_id,
            'purchase_order_id' => $this->purchase_order_id,
            'material_count' => $this->material_count,
        ]);

        return $dataProvider;
    }
}
