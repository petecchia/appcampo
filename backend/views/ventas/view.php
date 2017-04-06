<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ventas */

$this->title = $model->id_p;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_p' => $model->id_p, 'id_c' => $model->id_c, 'id_u' => $model->id_u], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_p' => $model->id_p, 'id_c' => $model->id_c, 'id_u' => $model->id_u], [
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
            'id_p',
            'id_c',
            'id_u',
            'n_ventas',
            'media',
        ],
    ]) ?>

</div>
