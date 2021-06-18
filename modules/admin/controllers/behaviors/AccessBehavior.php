<?php

namespace app\modules\admin\controllers\behaviors;

use Yii;
use yii\base\Behavior;
use yii\web\Controller;

class AccessBehavior extends Behavior
{
    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'checkAccess'];
    }
    public function checkAccess()
    {
        if (Yii::$app->user->identity->is_admin === 0) {
            return Yii::$app->controller->redirect(['/home/index']);
        }
    }
}