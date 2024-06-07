<?php

use app\models\Dispose;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\DisposeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Disposes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispose-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dispose Asset', ['mylogs/dispose'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'serialno',
            'name',
            'model',
            'state',
            'assettag',
            'location',
            'region_from',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Dispose $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>


</div>





