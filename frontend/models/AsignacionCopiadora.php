<?php

namespace app\models;

use Yii;
use common\models\User;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "asignacion_copiadora".
 *
 * @property integer $id_departamento
 * @property integer $id_copiadora
 * @property string $serie
 */
class AsignacionCopiadora extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'asignacion_copiadora';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_departamento', 'id_copiadora', 'serie'], 'required'],
            [['id_departamento', 'id_copiadora'], 'integer'],
            [['serie'], 'string', 'max' => 50],
            [['serie'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_departamento' => 'Id Departamento',
            'id_copiadora' => 'Id Copiadora',
            'serie' => 'Serie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopiadora() {
        return $this->hasOne(Provincias::className(), ['id' => 'id_copiadora']);
    }

    public function getcomboCopiadora() {
        $models = Copiadoras::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'nombre');
    }

}
