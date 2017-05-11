<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductCategory;

/**
 * SearchProductCategory represents the model behind the search form about `app\models\ProductCategory`.
 */
class SearchProductCategory extends ProductCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_id'], 'integer'],
            [['product_category_name'], 'safe'],
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
        $query = ProductCategory::find();

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
            'product_category_id' => $this->product_category_id,
        ]);

        $query->andFilterWhere(['like', 'product_category_name', $this->product_category_name]);

        return $dataProvider;
    }
}
