<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ventas;

/**
 * VentasSearch represents the model behind the search form about `backend\models\Ventas`.
 */
class VentasSearch extends Ventas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_p', 'id_c', 'id_u'], 'integer'],
            [['n_ventas', 'media'], 'number'],
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
        $query = Ventas::find();

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
            'id_p' => $this->id_p,
            'id_c' => $this->id_c,
            'id_u' => $this->id_u,
            'n_ventas' => $this->n_ventas,
            'media' => $this->media,
        ]);

        return $dataProvider;
    }
}
