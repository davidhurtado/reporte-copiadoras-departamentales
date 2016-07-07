<?php

namespace app\models;


use Yii;
use yii\helpers\ArrayHelper;

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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopiadora()
    {
        return $this->hasOne(Copiadoras::className(), ['id' => 'id_copiadora']);
    }
        
        //RELLENAR DROOPDOWNS
        public function getcomboUser() { 
        $models = \common\models\User::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'username');
    }
        
        public function getcomboCopiadora() { 
        $models = Copiadoras::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'nombre');
    }
        
}
