<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use  yii\helpers\Url;

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
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/home/index']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Авторизация', 'url' => ['/admin/auth/login']]
            ) : (
                '<li> <a href="'
                . Url::to('/home/create')

                . '">Добавить запись</a></li><li>'
                . Html::beginForm(['/admin/auth/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
            (Yii::$app->user->identity->is_admin == 1) ?
                '<li> <a href="'
                . Url::to('/admin')

                . '">Панель администратора</a></li>' : ''
        ],
    ]);
    NavBar::end();
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
