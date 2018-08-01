<?php

use yii\db\Migration;

class m180723_060544_create_table_config_payment_method extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%config_payment_method}}', [
            'tid' => $this->bigPrimaryKey(),
            'payment_method_name' => $this->string()->defaultValue('')->comment('支付方式名称 支付宝、微信、银行卡'),
            'status' => $this->tinyInteger()->defaultValue('0')->comment('支付方式状态  0：不可用 1：可用 2：禁用'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%config_payment_method}}');
    }
}
