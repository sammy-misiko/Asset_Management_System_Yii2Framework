<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AssetRegister;
use app\models\Staff;

/** @var yii\web\View $this */
/** @var app\models\Mylogs $model */
/** @var ActiveForm $form */

$this->title = 'Recall Asset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recall-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

         <!-- I want to fetch only staff from ICT department -->
        <?php $ictStaff = Staff::find()->where(['depname' => 'ICT'])->all(); ?>

        <?= $form->field($model, 'issue_date') ?>

        <?= $form->field($model, 'receivedby')->dropDownList(
            ArrayHelper::map($ictStaff, 'username', 'username'),
            ['prompt' => '']
        ); ?>

        <!-- <?= $form->field($model, 'receivedby') ?> -->
        <!-- <?= $form->field($model, 'receivedfrom') ?> -->
        <?= $form->field($model, 'receivedfrom')->dropDownList(ArrayHelper::map(Staff::find()->all(), 'username', 'username'), ['prompt'=>''])?>

        <!-- <?= $form->field($model, 'state') ?> -->
        <?= $form->field($model, 'state')->dropDownList([
            'Working' => 'Working',
            'Faulty' => 'Faulty',
            'Dispose' => 'Marked for Dispose',
            'Repair' => 'In Repair',
        ], ['prompt' => '']) ?>

        <!-- <?= $form->field($model, 'serialno') ?> -->
        <?= $form->field($model, 'serialno')->dropDownList(ArrayHelper::map(AssetRegister::find()->all(), 'serialno', 'serialno'), ['prompt'=>''])?>

        <!-- <?= $form->field($model, 'asset_location') ?> -->
        <?= $form->field($model, 'asset_location')->dropDownList([
            'Ready' => 'Ready for Issue',
            'Issued' => 'Issued',
            'Disposed' => 'Disposed',
            'Repair' => 'In Repair',
        ], ['prompt' => '']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- recall-index -->
