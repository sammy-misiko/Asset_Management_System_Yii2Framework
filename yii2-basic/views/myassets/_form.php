<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Myassets $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="myassets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serialno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'state')->dropDownList([
            'Working' => 'Working',
            'Faulty' => 'Faulty',
            'Dispose' => 'Marked for Dispose',
            'Repair' => 'In Repair',
        ], ['prompt' => 'Select State']) ?>

    <?= $form->field($model, 'assettag')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'location')->dropDownList([
            'Ready' => 'Ready for Issue',
            'Issued' => 'Issued',
            'Disposed' => 'Disposed',
            'Repair' => 'In Repair',
        ], ['prompt' => 'Select Location']) ?>

    <?= $form->field($model, 'region_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'received_date')->textInput() ?>

    <?= $form->field($model, 'supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purchase_date')->textInput() ?>

    <?= $form->field($model, 'purchase_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
