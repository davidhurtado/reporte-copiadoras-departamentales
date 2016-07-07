<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "reporte_fallos".
 *
 * @property integer $id
 * @property integer $id_departamento
 * @property integer $id_copiadora
 * @property string $descripcion
 * @property integer $estado
 * @property string $serie
 * @property string $respuesta
 * @property string $fecha_enviado
 * @property string $fecha_atendido
 */
class ReporteFallos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reporte_fallos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_departamento', 'id_copiadora', 'descripcion', 'estado', 'serie', 'respuesta'], 'required'],
            [['id_departamento', 'id_copiadora', 'estado'], 'integer'],
            [['fecha_enviado', 'fecha_atendido'], 'safe'],
            [['descripcion', 'respuesta'], 'string', 'max' => 200],
            [['serie'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_departamento' => 'Id Departamento',
            'id_copiadora' => 'Id Copiadora',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'serie' => 'Serie',
            'respuesta' => 'Respuesta',
            'fecha_enviado' => 'Fecha Enviado',
            'fecha_atendido' => 'Fecha Atendido',
        ];
    }
            /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopiadora() {
        return $this->hasOne(Copiadoras::className(), ['id' => 'id']);
    }

    public function getcomboCopiadora() {
        $models = Copiadoras::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'nombre');
    }
      public function getDepartamentos() {
        return $this->hasOne(Departamentos::className(), ['id' => 'id_copiadora']);
    }

    public function getcomboDepartamentos() {
        $models = Departamentos::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'nombre');
    }
}
