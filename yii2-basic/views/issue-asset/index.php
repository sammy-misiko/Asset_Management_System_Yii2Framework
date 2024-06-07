<?php

use app\models\IssueAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\IssueAssetSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Issue Assets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-asset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Issue Asset', ['mylogs/issue'], ['class' => 'btn btn-success']) ?>
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, IssueAsset $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],

        ],
    ]); ?>


</div>
