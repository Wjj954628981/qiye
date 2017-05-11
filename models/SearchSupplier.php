<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supplier;

/**
 * SearchSupplier represents the model behind the search form about `app\models\Supplier`.
 */
class SearchSupplier extends Supplier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'telephone'], 'integer'],
            [['company_name', 'address'], 'safe'],
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
        $query = Supplier::find();

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
            'telephone' => $this->telephone,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
