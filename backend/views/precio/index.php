<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrecioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Precios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="precio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Precio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prod',
            'id',
            'precio_medio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
