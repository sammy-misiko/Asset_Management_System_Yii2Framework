<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MyassetsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="myassets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'serialno') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'assettag') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'region_from') ?>

    <?php // echo $form->field($model, 'project_type') ?>

    <?php // echo $form->field($model, 'received_date') ?>

    <?php // echo $form->field($model, 'supplier') ?>

    <?php // echo $form->field($model, 'purchase_date') ?>

    <?php // echo $form->field($model, 'purchase_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
