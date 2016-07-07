<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReporteFallos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reporte-fallos-form">

    <?php $form = ActiveForm::begin(); ?>
<?=$form->field($model, 'id_copiadora')->dropDownList($model->comboCopiadora,array("disabled"=>"disabled"))?>

<?=$form->field($model, 'id_departamento')->dropDownList($model->comboDepartamentos,array("disabled"=>"disabled"))?>


    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'readOnly'=>true]) ?>

    <?= $form->field($model, 'estado')->dropDownList(['0' => 'Pendiente', '1' => 'Reparado',]); ?>
    <?= $form->field($model, 'respuesta')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
