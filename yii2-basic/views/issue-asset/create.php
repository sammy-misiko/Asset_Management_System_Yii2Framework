<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\IssueAsset $model */

$this->title = 'Create Issue Asset';
$this->params['breadcrumbs'][] = ['label' => 'Issue Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-asset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
