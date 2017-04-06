<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Registro_precio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Registro Precios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-precio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_prod',
            'id_precio',
            'precio_medio',
            'fecha',
        ],
    ]) ?>

</div>
