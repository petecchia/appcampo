<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "registro_precio".
 *
 * @property integer $id
 * @property integer $id_prod
 * @property integer $id_precio
 * @property double $precio_medio
 * @property string $fecha
 *
 * @property Precio $idPrecio
 * @property Producto $idProd
 */
class Registro_precio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registro_precio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_prod', 'id_precio'], 'integer'],
            [['precio_medio'], 'number'],
            [['fecha'], 'safe'],
            [['id_precio'], 'exist', 'skipOnError' => true, 'targetClass' => Precio::className(), 'targetAttribute' => ['id_precio' => 'id']],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_prod' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_prod' => 'Id Prod',
            'id_precio' => 'Id Precio',
            'precio_medio' => 'Precio Medio',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPrecio()
    {
        return $this->hasOne(Precio::className(), ['id' => 'id_precio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProd()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_prod']);
    }
}
