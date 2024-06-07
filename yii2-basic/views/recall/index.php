<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Mylogs $model */
/** @var ActiveForm $form */
?>
<div class="recall-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'issue_date') ?>
        <?= $form->field($model, 'issuedby') ?>
        <?= $form->field($model, 'issuedto') ?>
        <?= $form->field($model, 'receivedby') ?>
        <?= $form->field($model, 'receivedfrom') ?>
        <?= $form->field($model, 'state') ?>
        <?= $form->field($model, 'serialno') ?>
        <?= $form->field($model, 'asset_location') ?>
        <?= $form->field($model, 'disposal') ?>
        <?= $form->field($model, 'disposed_by') ?>
        <?= $form->field($model, 'repaired') ?>
        <?= $form->field($model, 'repaired_by') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- recall-index -->
