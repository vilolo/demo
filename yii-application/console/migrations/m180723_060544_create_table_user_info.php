<?php

use yii\db\Migration;

class m180723_060544_create_table_user_info extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_info}}', [
            'tid' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->defaultValue('0')->comment('用户ID'),
            'user_name' => $this->string()->defaultValue('')->comment('用户帐号'),
            'nick_name' => $this->string()->defaultValue('')->comment('用户昵称'),
            'user_pic' => $this->string()->defaultValue('')->comment('用户头像Url'),
            'user_level' => $this->integer()->defaultValue('0')->comment('用户等级   0：初始化 '),
            'market_trader' => $this->tinyInteger()->defaultValue('0')->comment('是否是市商 0：不可用  1：可用  2：禁用'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_info}}');
    }
}
