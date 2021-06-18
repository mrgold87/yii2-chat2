<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210130_175642_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
             'id' => $this->primaryKey(),
			 'username' => $this->string(255)->notNull(),
			 'password' => $this->string(255)->notNull(),
			 'auth_key' => $this->string(255)->null(),
			 'is_admin' => $this->tinyInteger(4)->defaultValue(0),
        ]);
        $this->insert('user',[ 'username' =>'admin', 'password' =>'$2y$13$IJgmnN7K.SE5LQRCNL.8g.WH8qqqdUM0jyhtn8jX0WxFxM5BP2j9S','is_admin' => 1]);
        $this->insert('user',[ 'username' =>'admin2', 'password' =>'$2y$13$IJgmnN7K.SE5LQRCNL.8g.WH8qqqdUM0jyhtn8jX0WxFxM5BP2j9S','is_admin' => 1]);
        $this->insert('user',[ 'username' =>'user', 'password' =>'$2y$13$IJgmnN7K.SE5LQRCNL.8g.WH8qqqdUM0jyhtn8jX0WxFxM5BP2j9S','is_admin' => 0]);
        $this->insert('user',[ 'username' =>'user2', 'password' =>'$2y$13$IJgmnN7K.SE5LQRCNL.8g.WH8qqqdUM0jyhtn8jX0WxFxM5BP2j9S','is_admin' => 0]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}


