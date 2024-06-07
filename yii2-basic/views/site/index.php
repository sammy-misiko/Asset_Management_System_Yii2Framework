<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;
use yii\grid\GridView;
use yii\grid\ActionColumn;

$this->title = 'R2-ASSET';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myassets-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            // Add more columns as needed
          
        ],
    ]); ?>


</div>
