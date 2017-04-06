<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_come
 * @property integer $id
 * @property string $nombre
 * @property string $mail
 * @property string $pass
 * @property string $municipio
 *
 * @property Finca[] $fincas
 * @property Comercializadora $idCome
 * @property Ventas[] $ventas
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_come', 'id'], 'integer'],
            [['id'], 'required'],
            [['nombre', 'mail', 'pass', 'municipio'], 'string', 'max' => 255],
            [['id_come'], 'exist', 'skipOnError' => true, 'targetClass' => Comercializadora::className(), 'targetAttribute' => ['id_come' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_come' => 'Id Come',
            'id' => 'ID',
            'nombre' => 'Nombre',
            'mail' => 'Mail',
            'pass' => 'Pass',
            'municipio' => 'Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFincas()
    {
        return $this->hasMany(Finca::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCome()
    {
        return $this->hasOne(Comercializadora::className(), ['id' => 'id_come']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['id_u' => 'id']);
    }
}
