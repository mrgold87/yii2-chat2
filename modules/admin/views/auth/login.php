<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">Введите логин и пароль, чтобы войти в панель администратора</h3>
            <?php $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'options' => [
                    'class' => 'form-horizontal',
                ],
                'fieldConfig' => [
                    'template' => "<div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n <div class='col-md-5'> {error} </div>",
                ]
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Login', 'class' => 'form-control']) ?>
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password', 'class' => 'form-control']) ?>
            <?= $form->field($model, 'rememberMe')->checkbox(['template' => "{label} {input}"]) ?>
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary ', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>