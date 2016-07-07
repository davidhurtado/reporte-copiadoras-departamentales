<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsuariosDepartamento */

$this->title = 'Añadir Usuario a este Departamento';
?>
<div class="usuarios-departamento-create jumbotron">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
