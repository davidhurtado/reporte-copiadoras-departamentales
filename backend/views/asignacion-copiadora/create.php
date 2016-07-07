<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AsignacionCopiadora */

$this->title = 'Asignacion Copiadora';
$this->params['breadcrumbs'][] = ['label' => 'Asignacion Copiadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignacion-copiadora-create jumbotron">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
