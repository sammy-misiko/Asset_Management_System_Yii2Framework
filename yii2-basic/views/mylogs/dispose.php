<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Staff;
use app\models\Myassets;

/** @var yii\web\View $this */
/** @var app\models\Mylogs $model */
/** @var ActiveForm $form */
$this->title = 'Dispose Asset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recall-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <!-- I want to fetch only staff from ICT department -->
        <?php $ictStaff = Staff::find()->where(['depname' => 'ICT'])->all(); ?>

        <!-- I want to dispose only assets that are in faulty or dispose state and have not been issued -->
        <?php $disposeAsset = Myassets::find()->where(['location' => 'Ready', 'state' => ['Faulty','Dispose']])->all(); ?>

        <?= $form->field($model, 'issue_date') ?>

        <?= $form->field($model, 'disposed_by')->dropDownList(
            ArrayHelper::map($ictStaff, 'username', 'username'),
            ['prompt' => '']
        ); ?>

        <?= $form->field($model, 'state')->dropDownList([
            'Faulty' => 'Faulty',
            'Dispose' => 'Marked for Dispose',
        ], ['prompt' => '']) ?>

        <?= $form->field($model, 'serialno')->dropDownList(
            ArrayHelper::map($disposeAsset, 'serialno', 'serialno'),
            ['prompt' => '']
        ); ?>

        <?= $form->field($model, 'asset_location')->dropDownList([
            'Disposed' => 'Disposed',
        ], ['prompt' => '']) ?>
    
        <?= $form->field($model, 'disposal')->dropDownList([
            'Disposed' => 'Has Been Disposed',
            
        ], ['prompt' => '']) ?>
        
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- recall-index -->
