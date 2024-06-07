<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dispose $model */

$this->title = 'Update Dispose: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Disposes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dispose-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
