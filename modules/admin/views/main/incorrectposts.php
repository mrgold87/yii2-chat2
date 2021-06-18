<?php

use yii\grid\GridView;
use yii\helpers\Html;
use \yii\helpers\Url;
use \yii\widgets\LinkPager;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Некоректные сообщения</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Некоректные сообщения</div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
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
            </div>
        </div>
    </div>
</div>