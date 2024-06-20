<?php

use app\models\Myassets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MyassetsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myassets-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Asset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serialno',
            'name',
            'model',
            'state',
            'assettag',
            'location',
            'region_from',
            //'project_type',
            //'received_date',
            //'supplier',
            //'purchase_date',
            //'purchase_price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Myassets $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'serialno' => $model->serialno]);
                 }
            ],
        ],
    ]); ?>


</div>
