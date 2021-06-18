<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Изменить статус <?= $post->title ?></h2>
            <?php
            $form = ActiveForm::begin();
            echo $form->field($post, 'incorrect')->dropDownList(($post->incorrect ? [1 => 'Некорректное', 0 => 'Корректное']:[0 => 'Корректное',1 => 'Некорректное'])); ?>
            <div class="form-group">
                <div class="col-md-5 col-md-offset-2">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>