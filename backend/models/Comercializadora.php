<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comercializadora".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $municipio
 * @property string $contacto
 *
 * @property Finca[] $fincas
 * @property Producto[] $productos
 * @property Usuario[] $usuarios
 * @property Ventas[] $ventas
 */
class Comercializadora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comercializadora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'municipio', 'contacto'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'municipio' => 'Municipio',
            'contacto' => 'Contacto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFincas()
    {
        return $this->hasMany(Finca::className(), ['id_com' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id_com' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_come' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['id_c' => 'id']);
    }
}
