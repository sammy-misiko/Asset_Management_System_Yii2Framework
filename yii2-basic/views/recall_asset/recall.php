<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\IssueAsset $model */
/** @var ActiveForm $form */
?>
<div class="recall_asset-recall">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'model') ?>
        <?= $form->field($model, 'state') ?>
        <?= $form->field($model, 'region_from') ?>
        <?= $form->field($model, 'serialno') ?>
        <?= $form->field($model, 'assettag') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- recall_asset-recall -->
