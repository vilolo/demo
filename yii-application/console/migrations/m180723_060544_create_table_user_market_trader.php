<?php

use yii\db\Migration;

class m180723_060544_create_table_user_market_trader extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_market_trader}}', [
            'tid' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->defaultValue('0')->comment('用户ID'),
            'aic_trader' => $this->tinyInteger()->defaultValue('0')->comment('AIC交易  0：不可用 1：可用 2：禁用'),
            'btc_trader' => $this->tinyInteger()->defaultValue('0')->comment('BTC交易  0：不可用 1：可用 2：禁用'),
            'eth_trader' => $this->tinyInteger()->defaultValue('0')->comment('ETH交易  0：不可用 1：可用 2：禁用'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_market_trader}}');
    }
}
