<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "finca".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property integer $id_com
 * @property string $producto
 * @property string $f_siembra
 * @property double $superficie
 * @property double $kilos
 * @property string $nombre
 *
 * @property Comercializadora $idCom
 * @property Usuario $idUsuario
 */
class Finca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'finca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_usuario', 'id_com'], 'integer'],
            [['f_siembra'], 'safe'],
            [['superficie', 'kilos'], 'number'],
            [['producto', 'nombre'], 'string', 'max' => 255],
            [['id_com'], 'exist', 'skipOnError' => true, 'targetClass' => Comercializadora::className(), 'targetAttribute' => ['id_com' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'Id Usuario',
            'id_com' => 'Id Com',
            'producto' => 'Producto',
            'f_siembra' => 'F Siembra',
            'superficie' => 'Superficie',
            'kilos' => 'Kilos',
            'nombre' => 'Nombre',
        ];
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
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
    }
}
