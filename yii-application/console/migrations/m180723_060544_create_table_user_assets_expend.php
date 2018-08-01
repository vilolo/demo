<?php

use yii\db\Migration;

class m180723_060544_create_table_user_assets_expend extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_assets_expend}}', [
            'tid' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->defaultValue('0')->comment('用户ID'),
            'user_assets_id' => $this->bigInteger()->defaultValue('0')->comment('用户资产ID   （资产中有多少币种便有多少个ID）'),
            'coin_id' => $this->bigInteger()->defaultValue('0')->comment('币种ID'),
            'coin_name' => $this->string()->defaultValue('')->comment('币种名称'),
            'coin_quantity' => $this->decimal()->defaultValue('0.000000')->comment('支出数量'),
            'transactions_id' => $this->bigInteger()->defaultValue('0')->comment('交易ID'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_assets_expend}}');
    }
}
