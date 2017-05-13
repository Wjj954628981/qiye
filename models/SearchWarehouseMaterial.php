<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WarehouseMaterial;

/**
 * SearchWarehouseMaterial represents the model behind the search form about `app\models\WarehouseMaterial`.
 */
class SearchWarehouseMaterial extends WarehouseMaterial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'warehouse_id', 'material_count'], 'integer'],
            [['material_id', 'warehouse_id', 'material_count'], 'safe']
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
        $query = WarehouseMaterial::find();

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
            'warehouse_id' => $this->warehouse_id,
            'material_count' => $this->material_count,
        ]);

        return $dataProvider;
    }

}
