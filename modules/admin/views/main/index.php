<?php

use yii\grid\GridView;
use yii\helpers\Html;
use \yii\helpers\Url;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Панель администратора</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Список последних зарегистрированных пользователей</div>
                <?= GridView::widget([
                    'dataProvider' => $userDataProvider,
                    'tableOptions' => [
                        'class' => 'table table-striped'
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'username',
                        [
                            'attribute'=>'is_admin',
                            'value' => function($data){
                                return $data->is_admin ? 'Администратор' : 'Пользователь';
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Изменить',
                            'template' => '{change-role}',

                            'buttons' => [
                                'change-role' => function ($url) {
                                    return Html::a('Изменить роль', $url);
                                },
                            ],
                        ],
                    ],
                ]); ?>
                <div class="panel-heading">
                    <a class="btn btn-primary" href="<?= Url::to('/admin/main/users') ?>">Все пользователи</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Последние сообщения</div>
                <?= GridView::widget([
                    'dataProvider' => $postDataProvider,
                    'tableOptions' => [
                        'class' => 'table table-striped'
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'title',
                        'content',
                        [
                            'attribute'=>'incorrect',
                            'value' => function($data){
                                return $data->incorrect ? 'Некорректное' : 'Корректное';
                            }
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Изменить',
                            'template' => '{change-status}',

                            'buttons' => [
                                'change-status' => function ($url) {
                                    return Html::a('Изменить статус', $url);
                                },
                            ],
                        ],
                    ],
                ]); ?>
                <div class="panel-heading">
                    <a class="btn btn-primary" href="<?= Url::to('/admin/main/posts') ?>">Корректные сообщения</a>
                    <a class="btn btn-primary" href="<?= Url::to('/admin/main/incorrect-posts') ?>">Некорректные
                        сообщения</a>
                </div>
            </div>
        </div>
    </div>
</div>