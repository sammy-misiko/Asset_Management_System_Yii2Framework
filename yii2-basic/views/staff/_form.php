<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Department;

/** @var yii\web\View $this */
/** @var app\models\Staff $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staffno')->textInput() ?>

    <!-- <?= $form->field($model, 'depname')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'depname')->dropDownList(ArrayHelper::map(Department::find()->all(), 'depname', 'depname'), ['prompt'=>'Select Department'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
