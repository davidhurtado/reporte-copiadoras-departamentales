<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Copiadoras;
use app\models\Departamentos;
/* @var $this yii\web\View */
/* @var $model app\models\Copiadoras */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Copiadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$modelCopiadora = $model->getdataCopiadora();
?>
<div class="copiadoras-view">

    <h1>Copiadoras <?= $model->nombre ?> Asignadas</h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <div class="col-lg-6">
        <?=
        GridView::widget([
            'dataProvider' => $modelCopiadora,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id_departamento',
                    'label' => 'Departamento',
                    'format' => 'raw',
                    'value' => function($data) {
             return Html::a(Departamentos::findOne(['id' => $data['id_departamento']])->nombre, ['departamentos/view', 'id' => $data['id_departamento']]);
                    }],
                ['attribute' => 'id_copiadora',
                    'label' => 'Copiadora',
                    'value' => function($data) {
                        return Copiadoras::findOne(['id' => $data['id_copiadora']])->nombre;
                    }],
                        'serie',
                        ['class' => 'yii\grid\ActionColumn',
                            'template' => '{delete}',
                            'buttons' => [
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['asignacion-copiadora/delete', 'id' => $model['serie']], [
                                                'title' => Yii::t('yii', 'Eliminar'),
                                    ]);
                                },
                                    ]],
                            ],
                        ]);
                        ?>
    </div>
</div>
