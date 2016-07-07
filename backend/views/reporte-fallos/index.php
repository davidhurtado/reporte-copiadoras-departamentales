<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Departamentos;
use app\models\Copiadoras;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reporte Fallos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporte-fallos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model, $index, $widget, $grid) {

            if ($model->estado == 0) {
                return ['class' => 'danger'];
            } else {
                return ['class' => 'success'];
            }
        },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id_departamento',
                        'label' => 'Departamento',
                        'value' => function($data) {
                            return Departamentos::findOne(['id' => $data['id_departamento']])->nombre;
                        }],
                            ['attribute' => 'id_copiadora',
                                'label' => 'Copiadora',
                                'value' => function($data) {
                                    return Copiadoras::findOne(['id' => $data['id_copiadora']])->nombre;
                                }],
                                    'descripcion',
                                    ['attribute' => 'estado',
                                        'value' => function($data) {
                                            return $data['estado'] == 0 ? 'Pendiente' : 'Atendido';
                                        }],
                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);
                            ?>
</div>
