<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (!Yii::$app->user->isGuest) {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],

            'items' => [
                ['label' => 'Главная', 'url' => ['/']],
                ['label' => 'Добавить сообщение', 'url' => ['/home/create']],
                ['label' => 'Выйти ( ' . Yii::$app->user->identity->username . ' )', 'url' => ['/admin/auth/logout']],
                ['label' => 'Панель администратора', 'url' => ['/admin']]
            ],
        ]);
        NavBar::end();
    } else {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],

            'items' => [
                ['label' => 'Главная', 'url' => ['/']],
                ['label' => 'Авторизация', 'url' => ['/admin/auth/login']]
            ],
        ]);
        NavBar::end();
    }
    ?>

    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Чат <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>