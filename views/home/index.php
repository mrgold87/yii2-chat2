<?php

use yii\widgets\LinkPager;
use \yii\helpers\Html;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Добро пожаловать в наш чат</h1>
            </div>
            <?php
            if (!empty($postList)):
                foreach ($postList as $post): ?>
                    <div class=" <?= $post->getClasses()['class'] ?>">
                        <span class="label label-danger"><?= $post->getClasses()['mark'] ?></span>
                        <div class="page-header">
                            <h3><?= Html::encode($post->title) ?>
                                <?php if ($post->user->is_admin == 1): ?>
                                    <span class="label label-success"> #<?= $post->user->username ?></span>
                                <?php endif; ?>
                            </h3>
                        </div>
                        <p>
                            <?= Html::encode($post->content) ?>
                        </p>
                    </div>
                <?php endforeach; ?>
                <div>
                    <?= LinkPager::widget(['pagination' => $pages]) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
