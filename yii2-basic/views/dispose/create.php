<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dispose $model */

$this->title = 'Create Dispose';
$this->params['breadcrumbs'][] = ['label' => 'Disposes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispose-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
