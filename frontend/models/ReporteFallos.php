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
            [[ 'id_copiadora', 'descripcion', 'serie'], 'required'],
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
        return $this->hasOne(Copiadoras::className(), ['id' => 'id_copiadora']);
    }

    public function getcomboSerieCopiadora() {
        $models = AsignacionCopiadora::find()->where(['id_departamento' => UsuariosDepartamento::findOne(Yii::$app->user->identity->id)->id_departamento])->asArray()->all();
        return ArrayHelper::map($models, 'id', 'serie');
    }

    public function getcomboNombreCopiadora() {
        //$models = AsignacionCopiadora::find()->where(['id_departamento'=> UsuariosDepartamento::findOne(['id_usuario'=>Yii::$app->user->identity->id])->id_departamento])->asArray()->all();
        //ArrayHelper::map(Copiadoras::find()->all(), 'id', 'nombre')
        return ArrayHelper::map(Copiadoras::find()->where(['id'=>  AsignacionCopiadora::find()->where(['id_departamento'=>UsuariosDepartamento::findOne(Yii::$app->user->identity->id)->id_departamento])->select('id_copiadora')])->all(), 'id', 'nombre');
    }
}
