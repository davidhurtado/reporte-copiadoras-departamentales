<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignacionCopiadora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignacion-copiadora-form">

    <?php $form = ActiveForm::begin(['id' => 'add-user-print']); ?>

    <!--?= $form->field($model, 'id_departamento')->textInput() ?-->

    <!--?= $form->field($model, 'id_copiadora')->textInput() ?-->
    <?= $form->field($model, 'id_copiadora')->dropDownList($model->comboCopiadora)->label('Copiadora') ?>
    <?= $form->field($model, 'serie')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php
    $this->registerJs('
        $("form#add-user-print").on("beforeSubmit", function(e) {
            var form = $(this);
             $.ajax({
              type: "POST",
           url: "asignacion-copiadora/create",
           data: {form.serialize(), id:'.$model->id_departamento.' },
           success: function(data) {
               alert(data);
           }
        });
            
        });
    ');
    ?>
</div>
