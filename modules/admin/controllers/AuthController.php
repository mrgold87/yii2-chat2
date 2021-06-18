<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\LoginForm;
use Yii;

class AuthController extends AppAdminController
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin');
    }
}