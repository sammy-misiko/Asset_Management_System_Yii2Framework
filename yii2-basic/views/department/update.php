<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Department $model */

$this->title = 'Update Department: ' . $model->depname;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->depname, 'url' => ['view', 'depname' => $model->depname]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
