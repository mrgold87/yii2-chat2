<?php

use yii\grid\GridView;
use yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\LinkPager;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Список пользователей</div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
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
            </div>
        </div>
    </div>
</div>