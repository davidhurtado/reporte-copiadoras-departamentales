<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "copiadoras".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $estado
 * @property integer $asignada
 */
class Copiadoras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'copiadoras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'estado'], 'required'],
            [['estado', 'asignada'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
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
            'estado' => 'Estado',
            'asignada' => 'Asignada',
        ];
    }
}
