<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Registro_precio */

$this->title = 'Create Registro Precio';
$this->params['breadcrumbs'][] = ['label' => 'Registro Precios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-precio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
