<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DisposeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dispose-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'serialno') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'assettag') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'region_from') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
