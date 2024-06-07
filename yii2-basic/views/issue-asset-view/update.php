<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Myassets $model */

$this->title = 'Update Myassets: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Myassets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'serialno' => $model->serialno]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="myassets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
