<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \app\models\UsuariosDepartamento;
use \app\models\AsignacionCopiadora;
use app\models\Copiadoras;
/* @var $this yii\web\View */
/* @var $model app\models\ReporteFallos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reporte-fallos-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=
            $form->field($model, 'id_copiadora')
            ->dropDownList(
                    $model->comboNombreCopiadora, [
                        'prompt'=>'Seleccione',
                'onchange' => '$.get("' .
                Yii::$app->urlManager->createUrl('reporte-fallos/list') . '", 
                    { id:$(this).val() }).done(function(data) {$("select#reportefallos-serie").html(data);});'
                    ]);
    ?>
    <?= $form->field($model, 'serie')->dropDownList([])->label('SERIE DE LA COPIADORA') ?>
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
