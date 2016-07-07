<?php

namespace app\models;


use Yii;
use yii\helpers\ArrayHelper;
use app\models\AsignacionCopiadora;
use app\models\UsuariosDepartamento;
use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "departamentos".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_user
 * @property integer $id_copiadora
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'unique'],
            [['nombre'], 'string', 'max' => 30],
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
        ];
    }
    
       public function getUser()
    {
        return $this->hasOne(UsuariosDepartamento::className(), ['id_deparamento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopiadora()
    {
        return $this->hasOne(AsignacionCopiadora::className(), ['id_deparamento' => 'id']);
    }
            //RELLENAR DROOPDOWNS
        public function getdataUser() { 
        $models = new ActiveDataProvider([
            'query' => UsuariosDepartamento::find()->where(['id_departamento'=>$_GET['id']]),
        ]);
        return $models;
    } 
        
        public function getdataCopiadora() { 
            $models = new ActiveDataProvider([
            'query' => AsignacionCopiadora::find()->where(['id_departamento'=>$_GET['id']]),
        ]);
        return $models;
    }
        
}
