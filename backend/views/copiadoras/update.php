<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Copiadoras */

$this->title = 'Update Copiadoras: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Copiadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="copiadoras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
