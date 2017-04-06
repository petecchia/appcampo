<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Registro_precio;

/**
 * Registro_precioSearch represents the model behind the search form about `backend\models\Registro_precio`.
 */
class Registro_precioSearch extends Registro_precio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_prod', 'id_precio'], 'integer'],
            [['precio_medio'], 'number'],
            [['fecha'], 'safe'],
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
        $query = Registro_precio::find();

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
            'id_prod' => $this->id_prod,
            'id_precio' => $this->id_precio,
            'precio_medio' => $this->precio_medio,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
