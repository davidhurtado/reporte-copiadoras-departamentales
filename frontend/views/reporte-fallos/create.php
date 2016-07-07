<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReporteFallos */

$this->title = 'Create Reporte Fallos';
$this->params['breadcrumbs'][] = ['label' => 'Reporte Fallos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporte-fallos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
