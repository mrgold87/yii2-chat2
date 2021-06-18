<?php

namespace app\modules\admin\controllers;
use app\models\User;
use app\models\Post;
use Yii;
use yii\data\ActiveDataProvider;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        $userDataProvider = new ActiveDataProvider([
            'query' => User::find()->limit(5),
            'sort'=>[
                'defaultOrder'=>[
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => false
        ]);
        $postDataProvider = new ActiveDataProvider([
            'query' => Post::find()->limit(5),
            'sort'=>[
                'defaultOrder'=>[
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => false
        ]);

        return $this->render('index', compact('userDataProvider', 'postDataProvider'));
    }

    public function actionUsers()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination'=>[
                'pageSize'=>10,
            ]
        ]);
        return $this->render('users', compact('dataProvider'));
    }

    public function actionIncorrectPosts()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::getQuery(1),
            'sort'=>[
                'defaultOrder'=>[
                    'id' => SORT_DESC
                ]
            ],
            'pagination'=>[
                'pageSize'=>10,
            ]
        ]);
        return $this->render('incorrectposts', compact('dataProvider'));
    }

    public function actionPosts()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::getQuery(0),
            'sort'=>[
                'defaultOrder'=>[
                    'id' => SORT_DESC
                ]
            ],
            'pagination'=>[
                'pageSize'=>10,
            ]
        ]);

        return $this->render('posts', compact('dataProvider'));
    }

    public function actionChangeRole($id)
    {
        $model = User::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin/main/users']);
        }

        return $this->render('role', compact('model'));
    }

    public function actionChangeStatus($id)
    {
        $post = Post::findOne($id);
        if ($post->incorrect) {
            $redirectPath = '/admin/main/incorrect-posts';
        } else {
            $redirectPath = '/admin/main/posts';
        }

        if ($post->load(Yii::$app->request->post()) && $post->save()) {
            return $this->redirect([$redirectPath]);
        }
        return $this->render('status', compact('post'));
    }
}