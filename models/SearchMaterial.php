<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Material;

/**
 * SearchMaterial represents the model behind the search form about `app\models\Material`.
 */
class SearchMaterial extends Material
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'material_category_id', 'material_min'], 'integer'],
            [['material_name'], 'safe'],
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
        $query = Material::find();

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
            'material_id' => $this->material_id,
            'material_category_id' => $this->material_category_id,
            'material_min' => $this->material_min,
        ]);

        $query->andFilterWhere(['like', 'material_name', $this->material_name]);

        return $dataProvider;
    }
}
