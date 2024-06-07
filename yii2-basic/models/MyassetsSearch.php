<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Myassets;

/**
 * MyassetsSearch represents the model behind the search form of `app\models\Myassets`.
 */
class MyassetsSearch extends Myassets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serialno', 'name', 'model', 'state', 'assettag', 'location', 'region_from', 'project_type', 'received_date', 'supplier', 'purchase_date'], 'safe'],
            [['purchase_price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Myassets::find();

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
            'received_date' => $this->received_date,
            'purchase_date' => $this->purchase_date,
            'purchase_price' => $this->purchase_price,
        ]);

        $query->andFilterWhere(['like', 'serialno', $this->serialno])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'assettag', $this->assettag])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'region_from', $this->region_from])
            ->andFilterWhere(['like', 'project_type', $this->project_type])
            ->andFilterWhere(['like', 'supplier', $this->supplier]);

        return $dataProvider;
    }
}
