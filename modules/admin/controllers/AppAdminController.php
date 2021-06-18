<?php

namespace app\modules\admin\controllers;

use app\modules\admin\controllers\behaviors\AccessBehavior;
use yii\web\Controller;

class AppAdminController extends Controller
{
    public function behaviors()
    {
        return [
            AccessBehavior::class,
        ];
    }
}