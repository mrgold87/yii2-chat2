<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div></div>
            <h2>Изменить роль пользователю <?= $model->username ?></h2>
            <?php
            $form = ActiveForm::begin();
            echo $form->field($model, 'is_admin')->dropDownList($model->is_admin ? [1 => 'Администратор', 0 => 'Пользователь']:[0 => 'Пользователь',1 => 'Администратор']); ?>
            <div class="form-group">
                <div class="col-md-5 col-md-offset-2">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>