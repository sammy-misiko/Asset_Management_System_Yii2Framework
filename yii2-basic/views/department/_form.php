<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Section;

/** @var yii\web\View $this */
/** @var app\models\Department $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'depname')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'section')->dropDownList(ArrayHelper::map(Section::find()->all(), 'section', 'section'), ['prompt'=>'Select section'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
