<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property integer $id_p
 * @property integer $id_c
 * @property integer $id_u
 * @property double $n_ventas
 * @property double $media
 *
 * @property Comercializadora $idC
 * @property Producto $idP
 * @property Usuario $idU
 */
class Ventas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_p', 'id_c', 'id_u'], 'required'],
            [['id_p', 'id_c', 'id_u'], 'integer'],
            [['n_ventas', 'media'], 'number'],
            [['id_c'], 'exist', 'skipOnError' => true, 'targetClass' => Comercializadora::className(), 'targetAttribute' => ['id_c' => 'id']],
            [['id_p'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_p' => 'id']],
            [['id_u'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_u' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_p' => 'Id P',
            'id_c' => 'Id C',
            'id_u' => 'Id U',
            'n_ventas' => 'N Ventas',
            'media' => 'Media',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdC()
    {
        return $this->hasOne(Comercializadora::className(), ['id' => 'id_c']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdP()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_p']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdU()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_u']);
    }
}
