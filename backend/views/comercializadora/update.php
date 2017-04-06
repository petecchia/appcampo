<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Comercializadora */

$this->title = 'Update Comercializadora: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comercializadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comercializadora-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
