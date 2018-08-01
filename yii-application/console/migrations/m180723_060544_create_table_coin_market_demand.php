<?php

use yii\db\Migration;

class m180723_060544_create_table_coin_market_demand extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%coin_market_demand}}', [
            'tid' => $this->bigPrimaryKey(),
            'market_level_id' => $this->bigInteger()->defaultValue('0')->comment('交易级别 1：普通交易  2：大宗交易'),
            'market_level_name' => $this->string()->defaultValue('')->comment('交易级别名称  普通交易 大宗交易'),
            'user_id' => $this->bigInteger()->defaultValue('0')->comment('需求方用户ID'),
            'nick_name' => $this->string()->defaultValue('')->comment('昵称'),
            'user_assets_id' => $this->bigInteger()->defaultValue('0')->comment('需求方用户资产ID'),
            'coin_id' => $this->bigInteger()->defaultValue('0')->comment('币ID'),
            'coin_code' => $this->string()->defaultValue('')->comment('币缩写'),
            'coin_quantity' => $this->decimal()->defaultValue('0.000000')->comment('需求总数量'),
            'trade_handle_quantity' => $this->decimal()->defaultValue('0.000000')->comment('交易处理中的数量'),
            'trade_finish_quantity' => $this->decimal()->defaultValue('0.000000')->comment('交易完成的数量'),
            'country_id' => $this->bigInteger()->defaultValue('0')->comment('国家Id'),
            'country_name' => $this->string()->defaultValue('')->comment('国家名称'),
            'currency_unit_id' => $this->bigInteger()->defaultValue('0')->comment('法币单位ID'),
            'currency_unit_code' => $this->string()->defaultValue('')->comment('法币单位缩写'),
            'coin_price' => $this->decimal()->defaultValue('0.00')->comment('单价（换算法币）'),
            'min_quotas' => $this->decimal()->defaultValue('0.00')->comment('供应方最低出售额度（换算法币）'),
            'max_quotas' => $this->decimal()->defaultValue('0.00')->comment('供应方最高出售额度（换算法币）'),
            'payment_method_id' => $this->string()->defaultValue('')->comment('支付方式ID，中间用半角逗号隔开'),
            'sign_code' => $this->string()->defaultValue('')->comment('标志码，用于收款/付款时区别之用（如区别是哪一个挂单）'),
            'memo' => $this->string()->defaultValue('')->comment('备注'),
            'status' => $this->tinyInteger()->defaultValue('0')->comment('状态 0：初始 1：挂单中 2：撤回 3：完成'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%coin_market_demand}}');
    }
}
