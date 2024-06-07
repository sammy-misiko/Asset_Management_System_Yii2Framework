<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IssueAsset;

/**
 * IssueAssetSearch represents the model behind the search form of `app\models\IssueAsset`.
 */
class IssueAssetSearch extends IssueAsset
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['serialno', 'name', 'model', 'state', 'assettag', 'location', 'region_from'], 'safe'],
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
        $query = IssueAsset::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'serialno', $this->serialno])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'assettag', $this->assettag])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'region_from', $this->region_from]);

        return $dataProvider;
    }
}
