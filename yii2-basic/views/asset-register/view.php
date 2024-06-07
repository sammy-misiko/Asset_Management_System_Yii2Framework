<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AssetRegister $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Asset Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'serialno' => $model->serialno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'serialno' => $model->serialno], [
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
            'issuedto',
            'state',
            'serialno',
            'name',
        ],
    ]) ?>

</div>
