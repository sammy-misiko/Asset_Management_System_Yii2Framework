<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AssetRegister $model */

$this->title = 'Create Asset Register';
$this->params['breadcrumbs'][] = ['label' => 'Asset Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
