<?php

use yii\db\Migration;

class m180723_060544_create_table_coin_market_trade extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%coin_market_trade}}', [
            'tid' => $this->bigPrimaryKey(),
            'demand_id' => $this->bigInteger()->defaultValue('0')->comment('需求ID（如果有）'),
            'buyer_user_id' => $this->bigInteger()->defaultValue('0')->comment('买方用户ID'),
            'buyer_nick_name' => $this->string()->defaultValue('')->comment('买方用户昵称'),
            'buyer_status' => $this->tinyInteger()->defaultValue('0')->comment('买方状态 1：待付款 2：已付款 3：申述未到帐  4：已取消'),
            'buyer_payment_at' => $this->integer()->defaultValue('0')->comment('买方付款时间'),
            'buyer_receipt_at' => $this->integer()->defaultValue('0')->comment('买方申述资产币未到帐'),
            'buyer_cancel_at' => $this->integer()->defaultValue('0')->comment('买方取消时间'),
            'coin_id' => $this->bigInteger()->defaultValue('0')->comment('币ID'),
            'coin_code' => $this->string()->defaultValue('')->comment('币缩写'),
            'coin_quantity' => $this->decimal()->defaultValue('0.000000')->comment('交易数量'),
            'currency_unit_id' => $this->bigInteger()->defaultValue('0')->comment('法币单位ID'),
            'currency_unit_code' => $this->string()->defaultValue('')->comment('货币单位'),
            'coin_price' => $this->decimal()->defaultValue('0.00')->comment('单价（换算法币）'),
            'user_payment_method_id' => $this->bigInteger()->defaultValue('0')->comment('用户支付方式ID'),
            'supply_id' => $this->bigInteger()->defaultValue('0')->comment('供应ID（如果有）'),
            'seller_user_id' => $this->bigInteger()->defaultValue('0')->comment('卖方用户ID'),
            'seller_nick_name' => $this->string()->defaultValue('')->comment('卖方用户昵称'),
            'seller_status' => $this->tinyInteger()->defaultValue('0')->comment('卖方状态 1：待收款 2：已收款 3：申述未到款'),
            'seller_receipt_at' => $this->integer()->defaultValue('0')->comment('卖方收款时间'),
            'seller_allegedly_at' => $this->integer()->defaultValue('0')->comment('申请法币未到帐时间'),
            'status' => $this->tinyInteger()->defaultValue('0')->comment('交易状态  0：失败  1：交易中  2：申述中  3：成功'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
            'finish_at' => $this->integer()->defaultValue('0')->comment('完成时间（成功失败均视为完成）'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%coin_market_trade}}');
    }
}
