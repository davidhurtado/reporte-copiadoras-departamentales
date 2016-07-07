<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosDepartamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-departamento-form">

    <?php
    $form = ActiveForm::begin(['id' => 'add-user-form']);
    ?>
    <?= $form->field($model, 'id_usuario')->dropDownList($model->comboUser)->label('Usuarios') ?>
    <!--?= $form->field($model, 'id_departamento')->textInput() ?-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs('
        $("form#add-user-form").on("beforeSubmit", function(e) {
            var form = $(this);
             $.ajax({
              type: "POST",
           url: "usuarios-departamento/create",
           data: {form.serialize(), id:'.$model->id_departamento.' },
           success: function(data) {
               alert(data);
           }
        });
            
        });
    ');
    ?>
</div>
