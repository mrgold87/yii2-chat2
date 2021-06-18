<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Создать сообщение</h2>
            </div>
            <?php
            $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'options' => [
                    'class' => 'form-horizontal',
                ],
                'fieldConfig' => [
                    'template' => "<div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>",
                ]
            ]) ?>

            <?= $form->field($model, 'title')->textInput(['placeholder' => 'Введите заголовок']); ?>
            <?= $form->field($model, 'content')->textarea(['rows' => 7, 'placeholder' => 'Введите сообщение']) ?>

            <div class="form-group">
                <div class="col-md-5 col-md-offset-2">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>