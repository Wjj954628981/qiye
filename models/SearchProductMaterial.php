<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductMaterial;

/**
 * SearchProductMaterial represents the model behind the search form about `app\models\ProductMaterial`.
 */
class SearchProductMaterial extends ProductMaterial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'material_id'], 'integer'],
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
        $query = ProductMaterial::find();

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
            'material_id' => $this->material_id,
        ]);

        return $dataProvider;
    }
}
