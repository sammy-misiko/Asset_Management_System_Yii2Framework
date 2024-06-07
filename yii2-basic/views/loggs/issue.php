<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\IssueAsset;

/** @var yii\web\View $this */
/** @var app\models\Mylogs $model */
/** @var ActiveForm $form */
$this->title = 'Issue Asset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recall-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'issue_date') ?>
        <?= $form->field($model, 'issuedby') ?>
        <?= $form->field($model, 'issuedto') ?>
        <!-- <?= $form->field($model, 'receivedby') ?> -->
        <!-- <?= $form->field($model, 'receivedfrom') ?> -->
        <?= $form->field($model, 'state') ?>
        <!-- <?= $form->field($model, 'serialno') ?> -->

        <?= $form->field($model, 'serialno')->dropDownList(ArrayHelper::map(IssueAsset::find()->all(), 'serialno', 'serialno'), ['prompt'=>'Select serial No'])?>

        <?= $form->field($model, 'asset_location') ?>
        <!-- <?= $form->field($model, 'disposal') ?> -->
        <!-- <?= $form->field($model, 'disposed_by') ?> -->
        <!-- <?= $form->field($model, 'repaired') ?> -->
        <!-- <?= $form->field($model, 'repaired_by') ?> -->
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- recall-index -->
