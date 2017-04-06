<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id
 * @property integer $id_com
 * @property double $precio_com
 * @property string $nombre
 *
 * @property Precio[] $precios
 * @property Comercializadora $idCom
 * @property RegistroPrecio[] $registroPrecios
 * @property Ventas[] $ventas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['id', 'id_com'], 'integer'],
            [['precio_com'], 'number'],
            [['nombre'], 'string', 'max' => 255],
            [['id_com'], 'exist', 'skipOnError' => true, 'targetClass' => Comercializadora::className(), 'targetAttribute' => ['id_com' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_com' => 'Comercializadora',
            'precio_com' => 'Precio',
            'nombre' => 'Producto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecios()
    {
        return $this->hasMany(Precio::className(), ['id_prod' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCom()
    {
        return $this->hasOne(Comercializadora::className(), ['id' => 'id_com']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroPrecios()
    {
        return $this->hasMany(RegistroPrecio::className(), ['id_prod' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['id_p' => 'id']);
    }
}
