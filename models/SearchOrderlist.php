<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orderlist;

/**
 * SearchOrderlist represents the model behind the search form about `app\models\Orderlist`.
 */
class SearchOrderlist extends Orderlist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'customer_id', 'purchase_time', 'duetime', 'telephone', 'order_state'], 'integer'],
            [['person_name'], 'safe'],
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
        $query = Orderlist::find();

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
            'order_id' => $this->order_id,
            'customer_id' => $this->customer_id,
            'purchase_time' => $this->purchase_time,
            'duetime' => $this->duetime,
            'telephone' => $this->telephone,
            'order_state' => $this->order_state,
        ]);

        $query->andFilterWhere(['like', 'person_name', $this->person_name]);

        return $dataProvider;
    }
}
