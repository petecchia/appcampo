<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComercializadoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comercializadoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comercializadora-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comercializadora', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'municipio',
            'contacto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
