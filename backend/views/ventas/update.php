<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ventas */

$this->title = 'Update Ventas: ' . $model->id_p;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_p, 'url' => ['view', 'id_p' => $model->id_p, 'id_c' => $model->id_c, 'id_u' => $model->id_u]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ventas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
