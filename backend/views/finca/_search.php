<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FincaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="finca-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_com') ?>

    <?= $form->field($model, 'producto') ?>

    <?= $form->field($model, 'f_siembra') ?>

    <?php // echo $form->field($model, 'superficie') ?>

    <?php // echo $form->field($model, 'kilos') ?>

    <?php // echo $form->field($model, 'nombre') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
