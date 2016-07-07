<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsignacionCopiadora */

$this->title = 'Update Asignacion Copiadora: ' . $model->serie;
$this->params['breadcrumbs'][] = ['label' => 'Asignacion Copiadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->serie, 'url' => ['view', 'id' => $model->serie]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignacion-copiadora-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
