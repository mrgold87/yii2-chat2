<?php

namespace app\controllers;
use app\models\Post;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class HomeController extends Controller
{

    public function actionIndex()
    {
        $isAdmin = Yii::$app->user->identity->is_admin;
        if ($isAdmin == 1) {
            $query = Post::find()->orderby(['id' => SORT_DESC]);
        } else {
            $query = Post::find()->where(['incorrect' => 0])->orderby(['id' => SORT_DESC]);
        }
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $postList = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('postList', 'pages'));
    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/']);
        } else {
            $is_user = Yii::$app->user->identity->id;
            $model = new Post();
            $model->user_id = $is_user;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['/']);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }
}