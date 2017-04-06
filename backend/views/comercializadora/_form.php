<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Municipios;

/* @var $this yii\web\View */
/* @var $model backend\models\Comercializadora */
/* @var $form yii\widgets\ActiveForm */
        $items = ArrayHelper::map(Municipios::find()->all(), 'nombre', 'nombre');
?>

<div class="comercializadora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>


   <?= $form->field($model, 'municipio')
        ->dropDownList(
            $items,           // Flat array ('id'=>'label')
            ['prompt'=>'Seleccione el municipio']    // options
        );
?>

    <?= $form->field($model, 'contacto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
