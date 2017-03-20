<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cooperativa".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $municipio
 * @property string $contacto
 */
class Cooperativa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cooperativa';
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
}
