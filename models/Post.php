<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public $classes = ['class' => 'well', 'mark' => ''];

    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string'],
            ['incorrect', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Текст',
            'incorrect' => 'Статус',
        ];
    }

    public static function getQuery($status)
    {
        return self::find()->where(['incorrect' => $status]);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getClasses()
    {
        if ($this->incorrect == 1) {
            return $this->classes = ['class' => 'alert alert-danger', 'mark' => 'Некорректное сообщение'];
        } else {
            return $this->classes;
        }
    }
}