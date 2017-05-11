<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaterialWarehouseOut;

/**
 * SearchMaterialWarehouseOut represents the model behind the search form about `app\models\MaterialWarehouseOut`.
 */
class SearchMaterialWarehouseOut extends MaterialWarehouseOut
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_out_orderid', 'warehouse_id', 'material_id', 'material_out_count'], 'integer'],
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
        $query = MaterialWarehouseOut::find();

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
            'material_out_orderid' => $this->material_out_orderid,
            'warehouse_id' => $this->warehouse_id,
            'material_id' => $this->material_id,
            'material_out_count' => $this->material_out_count,
        ]);

        return $dataProvider;
    }
}
