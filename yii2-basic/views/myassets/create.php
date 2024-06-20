<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Myassets $model */

$this->title = 'Create Asset';
$this->params['breadcrumbs'][] = ['label' => 'Myassets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myassets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
