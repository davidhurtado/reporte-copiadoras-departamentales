<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Copiadoras;
use common\models\User;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use app\models\AsignacionCopiadora;
use app\models\UsuariosDepartamento;
use \app\models\ReporteFallos;

/* @var $this yii\web\View */
/* @var $model app\models\Departamentos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nombre;
$modelCopiadora = $model->getdataCopiadora();
$modelUsuarios = $model->getdataUser();
?>
<div class="departamentos-view">

    <h1><?= $model->nombre; ?></h1>

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

    <div class="row">
        <div class="col-lg-6">
            <h1>Usuarios</h1><p>
                <?=
                Html::button('Añadir Usuarios', [
                    'class' => 'btn btn-success btn-ajax-modal',
                    'value' => Url::to(['/usuarios-departamento/create', 'id' => $model->id]),
                    'data-target' => '#modal_usuarios',
                ]);
                ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $modelUsuarios,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'id_usuario',
                        'label' => 'Nombres',
                        'value' => function($data) {
                            return User::findOne(['id' => $data['id_usuario']])->username;
                        }],
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}',
                                'buttons' => [
                                    'delete' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['usuarios-departamento/delete', 'id' => $model['id_usuario']], [
                                                    'title' => Yii::t('yii', 'Eliminar'),
                                        ]);
                                    },
                                        ]
                                    ],
                                ],
                            ]);
                            ?>
                            <?php
                            //*** SEE MODAL CODE IS NOW BELOW GRIDVIEW CODE
                            Modal::begin([
                                'id' => 'modal_usuarios',
                                'header' => '<h4>Usuarios</h4>',
                            ]);

                            echo '<div id="modal-content"></div>';
                            Modal::end();
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <h1>Copiadoras Asignadas</h1>
                            <p>
                                <?=
                                Html::button('Añadir Copiadoras', [
                                    'class' => 'btn btn-success btn-ajax-modal',
                                    'value' => Url::to(['/asignacion-copiadora/create', 'id' => $model->id]),
                                    'data-target' => '#modal_copiadoras',
                                ]);
                                ?>
                            </p>
                            <?=
                            GridView::widget([
                                'dataProvider' => $modelCopiadora,
                                'rowOptions' => function ($model, $index, $widget, $grid) {
                                    if (ReporteFallos::find()->where(['serie' => $model->serie])->count()) {
                                        if (ReporteFallos::findOne(['serie' => $model->serie])['estado'] == 0) {
                                            return ['class' => 'danger'];
                                        }
                                    } else {
                                        return [];
                                    }
                                },
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            ['attribute' => 'id_copiadora',
                                                'label' => 'Copiadora',
                                                'value' => function($data) {
                                                    return Copiadoras::findOne(['id' => $data['id_copiadora']])->nombre;
                                                }],
                                                    'serie',
                                                    ['class' => 'yii\grid\ActionColumn',
                                                        'template' => '{delete}{update}',
                                                        'buttons' => [
                                                            'delete' => function ($url, $model) {
                                                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['asignacion-copiadora/delete', 'id' => $model['serie']], [
                                                                            'title' => Yii::t('yii', 'Eliminar'),
                                                                ]);
                                                            }, 'update' => function ($url, $model) {
                                                                if (ReporteFallos::find()->where(['serie' => $model->serie])->count()) {
                                                                    if (ReporteFallos::findOne(['serie' => $model->serie])['estado'] == 0) {
                                                                        return '&nbsp;&nbsp;' . Html::a('<span class="glyphicon glyphicon-wrench"></span>', ['reporte-fallos/update', 'id' => ReporteFallos::findOne(['serie' => $model['serie']])['id']], [
                                                                                    'title' => Yii::t('yii', 'Revisar'),
                                                                        ]);
                                                                    }
                                                                }
                                                            },
                                                                ]],
                                                        ],
                                                    ]);
                                                    ?>
                                                    <?php
                                                    //*** SEE MODAL CODE IS NOW BELOW GRIDVIEW CODE
                                                    Modal::begin([
                                                        'id' => 'modal_copiadoras',
                                                        'header' => '<h4>Copiadoras</h4>',
                                                    ]);

                                                    echo '<div id="modal-content"></div>';
                                                    Modal::end();
                                                    ?>
                                                </div>

                                            </div> 
                                        </div>
                                        <?php
                                        $this->registerJs('
        $(\'.btn-ajax-modal\').click(function (){
        
    var elm = $(this),
        target = elm.attr(\'data-target\'),
        ajax_body = elm.attr(\'value\');

    $(target).modal(\'show\')
        .find(\'.modal-content\')
        .load(ajax_body);
});
    ');
                                        ?>
