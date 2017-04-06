<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "precio".
 *
 * @property integer $id_prod
 * @property integer $id
 * @property double $precio_medio
 *
 * @property Producto $idProd
 * @property RegistroPrecio[] $registroPrecios
 */
class Precio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'precio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prod', 'id'], 'integer'],
            [['id'], 'required'],
            [['precio_medio'], 'number'],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_prod' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prod' => 'Id Prod',
            'id' => 'ID',
            'precio_medio' => 'Precio Medio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProd()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_prod']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroPrecios()
    {
        return $this->hasMany(RegistroPrecio::className(), ['id_precio' => 'id']);
    }
}
