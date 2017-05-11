<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaterialCategory;

/**
 * SearchMaterialCategory represents the model behind the search form about `app\models\MaterialCategory`.
 */
class SearchMaterialCategory extends MaterialCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_category_id'], 'integer'],
            [['material_category_name'], 'safe'],
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
        $query = MaterialCategory::find();

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
            'material_category_id' => $this->material_category_id,
        ]);

        $query->andFilterWhere(['like', 'material_category_name', $this->material_category_name]);

        return $dataProvider;
    }
}
