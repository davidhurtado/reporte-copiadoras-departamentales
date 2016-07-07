<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "copiadoras".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $estado
 * @property integer $asignada
 */
class Copiadoras extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'copiadoras';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    public function getdataCopiadora() {
        $models = new ActiveDataProvider([
            'query' => AsignacionCopiadora::find()->where(['id_copiadora'=>$_GET['id']]),
        ]);
        return $models;
    }

}
