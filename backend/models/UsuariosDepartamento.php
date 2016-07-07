<?php

namespace app\models;

use Yii;
use common\models\User;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "usuarios_departamento".
 *
 * @property integer $id_usuario
 * @property integer $id_departamento
 */
class UsuariosDepartamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios_departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario'], 'required'],
            [['id_usuario'], 'integer'],
            [['id_usuario'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_departamento' => 'Id Departamento',
        ];
    }
            

            //RELLENAR DROOPDOWNS
        public function getcomboUser() { 
         $models = User::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'username');
        }
}
