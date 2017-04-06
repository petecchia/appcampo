<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Comercializadora;
/* @var $this yii\web\View */
/* @var $model backend\models\Producto */
/* @var $form yii\widgets\ActiveForm */
$items = ArrayHelper::map(Comercializadora::find()->all(), 'id', 'nombre');
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

 
    <?= $form->field($model, 'id_com')
        ->dropDownList(
            $items,           // Flat array ('id'=>'label')
            ['prompt'=>'Seleccione la comercializadora']    // options
        );
?>

    <?= $form->field($model, 'precio_com')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
