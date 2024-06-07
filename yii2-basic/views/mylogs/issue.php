<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\IssueAsset;
use app\models\Staff;

/** @var yii\web\View $this */
/** @var app\models\Mylogs $model */
/** @var ActiveForm $form */
$this->title = 'Issue Asset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recall-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- I want to fetch only staff from ICT department -->
    <?php $ictStaff = Staff::find()->where(['depname' => 'ICT'])->all(); ?>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'issue_date') ?>

        <!-- I want to fetch only staff from ICT department -->
        <?= $form->field($model, 'issuedby')->dropDownList(
            ArrayHelper::map($ictStaff, 'username', 'username'),
            ['prompt' => '']
        ); ?>

        <!-- <?= $form->field($model, 'issuedto') ?> -->
        <?= $form->field($model, 'issuedto')->dropDownList(ArrayHelper::map(Staff::find()->all(), 'username', 'username'), ['prompt'=>''])?>
       
        <?= $form->field($model, 'state')->dropDownList([
            'Working' => 'Working',
            'Faulty' => 'Faulty',
            'Dispose' => 'Marked for Dispose',
            'Repair' => 'In Repair',
        ], ['prompt' => '']) ?>


        <?= $form->field($model, 'serialno')->dropDownList(ArrayHelper::map(IssueAsset::find()->all(), 'serialno', 'serialno'), ['prompt'=>''])?>

       
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
