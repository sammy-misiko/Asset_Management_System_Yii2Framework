<?php

use yii\bootstrap5\NavBar;
use yii\bootstrap5\Nav;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-lg navbar-light bg-light shadow-sm']
]);


if (Yii::$app->user->isGuest) {
    $menuItems[] = [
        'label' => 'SignUp', 'url' => ['/site/signup']
    ];
    $menuItems[] = [
        'label' => 'Login', 'url' => ['/site/login']
    ];

} else {
    $menuItems[] = [
        'label' => 'Home', 'url' => ['/site/index']
    ];

    $menuItems[] = [
        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'POST'
        ]
    ];

}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ms-auto'],
    'items' => $menuItems
]);
NavBar::end();
