<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Copiadoras;
/* @var $this yii\web\View */
/* @var $model app\models\ReporteFallos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reporte Fallos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporte-fallos-view">

    <h2><?= Copiadoras::findOne(['id' => $model->id_copiadora])->nombre ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
             'serie',
            'descripcion',
            [
                'label'=>'Estado',
                'value' => $model->estado == 0 ? 'Pendiente' : 'Atendido',
            ],
        ],
    ]) ?>

</div>
