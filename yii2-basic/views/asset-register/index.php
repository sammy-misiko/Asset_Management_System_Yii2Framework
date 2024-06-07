<?php

use app\models\AssetRegister;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AssetRegisterSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Issued Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-register-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Recall Asset', ['mylogs/recall'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'issuedto',
            'state',
            'serialno',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AssetRegister $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'serialno' => $model->serialno]);
                 }
            ],
        ],
    ]); ?>


</div>
