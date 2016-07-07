<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use app\models\Copiadoras;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamentos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Departamentos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'nombre',
            /*['attribute' => 'id_user',
                'label' => 'Usuario',
                'value' => function($data) {
                    return User::findOne(['id' => $data['id_user']])->username;
                }],
                    ['attribute' => 'id_copiadora',
                        'label' => 'Copiadora',
                        'value' => function($data) {
                            return Copiadoras::findOne(['id' => $data['id_copiadora']])->nombre;
                        }],
                    'serie_copiadora',*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
