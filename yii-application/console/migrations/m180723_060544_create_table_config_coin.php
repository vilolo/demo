<?php

use yii\db\Migration;

class m180723_060544_create_table_config_coin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%config_coin}}', [
            'tid' => $this->bigPrimaryKey(),
            'coin_code' => $this->string()->defaultValue('')->comment('币缩写 如BTC，ETH，AIC'),
            'coin_name' => $this->string()->defaultValue('')->comment('币名称 如比特币、以太坊、墨晶'),
            'coin_icon' => $this->string()->defaultValue('')->comment('币图标Url'),
            'status' => $this->tinyInteger()->defaultValue('0')->comment('币状态 0：不可用 1：可用 2：禁用'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%config_coin}}');
    }
}
