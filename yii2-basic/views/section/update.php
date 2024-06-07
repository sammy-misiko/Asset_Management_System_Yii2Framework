<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Section $model */

$this->title = 'Update Section: ' . $model->section;
$this->params['breadcrumbs'][] = ['label' => 'Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->section, 'url' => ['view', 'section' => $model->section]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
